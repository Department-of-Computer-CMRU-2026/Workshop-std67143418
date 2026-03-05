<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Workshop;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $registrations = $user->registrations()->with('workshop')->latest()->get();
        return view('workshops.my-workshops', compact('registrations'));
    }

    public function destroy(Registration $registration)
    {
        // 🟢 Security Check: Alllow if Admin or if it's the User's own registration
        if (!session('admin_id') && Auth::id() !== $registration->user_id) {
            return redirect()->back()->with('error', 'คุณไม่มีสิทธิ์ในการดำเนินการนี้');
        }

        $registration->delete();
        return redirect()->back()->with('success', 'ยกเลิกการลงทะเบียนเรียบร้อยแล้ว');
    }
    public function create(Workshop $workshop)
    {
        $user = Auth::user();

        // 1. Check if workshop is full
        if ($workshop->registrations()->count() >= $workshop->capacity) {
            return redirect()->back()->with('error', 'กิจกรรมนี้ที่นั่งเต็มแล้ว');
        }

        // 2. Check if user already registered for THIS workshop
        if ($user->registrations()->where('workshop_id', $workshop->id)->exists()) {
            return redirect()->back()->with('error', 'คุณได้ลงทะเบียนกิจกรรมนี้ไปแล้ว');
        }

        // 3. Check if user reached the limit of 3 workshops
        if ($user->registrations()->count() >= 3) {
            return redirect()->back()->with('error', 'คุณสามารถลงทะเบียนได้สูงสุด 3 กิจกรรมเท่านั้น');
        }

        return view('workshops.register', compact('workshop'));
    }

    public function store(Request $request, Workshop $workshop)
    {
        $user = Auth::user();

        // Check if workshop is full
        if ($workshop->registrations()->count() >= $workshop->capacity) {
            return redirect()->back()->with('error', 'กิจกรรมนี้ที่นั่งเต็มแล้ว');
        }

        // Check if user has already registered (Duplicate prevention)
        if ($user->registrations()->where('workshop_id', $workshop->id)->exists()) {
            return redirect()->back()->with('error', 'คุณได้ลงทะเบียนกิจกรรมนี้ไปแล้ว');
        }

        // Check max 3 workshops limit
        if ($user->registrations()->count() >= 3) {
            return redirect()->back()->with('error', 'คุณสามารถลงทะเบียนได้สูงสุด 3 กิจกรรมเท่านั้น');
        }

        $workshop->registrations()->create([
            'user_id' => $user->id
        ]);

        return redirect('/')->with('success', 'ลงทะเบียนเข้าร่วมกิจกรรม ' . $workshop->title . ' สำเร็จแล้ว');
    }
}
