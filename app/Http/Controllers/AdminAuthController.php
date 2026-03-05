<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('admin_logged_in')) {
            return redirect()->route('workshops.index');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === '123') {
            session(['admin_logged_in' => true]);
            return redirect()->route('workshops.index')->with('success', 'เข้าสู่ระบบแอดมินสำเร็จ');
        }

        return redirect()->back()->with('error', 'Username หรือ Password ไม่ถูกต้อง');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('home')->with('success', 'ออกจากระบบแอดมินเรียบร้อยแล้ว');
    }
}
