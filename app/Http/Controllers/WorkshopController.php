<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Workshop;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Workshop::withCount('registrations')->latest();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('speaker', 'like', '%' . $request->search . '%');
        }

        $workshops = $query->get();

        // Dashboard Stats
        $totalCapacity = $workshops->sum('capacity');
        $totalRegistered = $workshops->sum('registrations_count');

        $stats = [
            'total_workshops' => $workshops->count(),
            'total_remaining_seats' => max(0, $totalCapacity - $totalRegistered),
            'full_workshops' => $workshops->filter(fn($w) => $w->registrations_count >= $w->capacity)->count(),
        ];

        return view('admin.workshops.index', compact('workshops', 'stats'));
    }

    public function exportCsv(Workshop $workshop)
    {
        $workshop->load('registrations');
        $fileName = 'participants_' . str_replace(' ', '_', $workshop->title) . '.csv';

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($workshop) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ชื่อ-นามสกุล', 'อีเมล', 'รหัสนักศึกษา', 'วันที่ลงทะเบียน']);

            foreach ($workshop->registrations as $registration) {
                fputcsv($file, [
                    $registration->user->name,
                    $registration->user->email,
                    $registration->user->student_id ?? 'N/A',
                    $registration->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.workshops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'speaker' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'scheduled_at' => 'required|date',
        ]);

        Workshop::create($validated);

        return redirect()->route('workshops.index')->with('success', 'สร้างกิจกรรมเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        $workshop->load('registrations.user');
        return view('admin.workshops.show', compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        return view('admin.workshops.edit', compact('workshop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workshop $workshop)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'speaker' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'scheduled_at' => 'required|date',
        ]);

        $workshop->update($validated);

        return redirect()->route('workshops.index')->with('success', 'อัปเดตกิจกรรมเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        return redirect()->route('workshops.index')->with('success', 'ลบกิจกรรมเรียบร้อยแล้ว');
    }
}
