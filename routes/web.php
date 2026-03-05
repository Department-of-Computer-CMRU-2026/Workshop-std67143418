<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Auth;
use App\Models\Workshop;
use App\Models\Registration;

Route::get('/', function () {
    $workshops = Workshop::withCount('registrations')->latest()->get();
    $userRegistrations = [];

    if (Auth::check()) {
        $userRegistrations = Auth::user()->registrations->pluck('workshop_id')->toArray();
    }

    return view('welcome', compact('workshops', 'userRegistrations'));
})->name('home');

// Student Auth
Route::get('/login', [AuthController::class , 'showLogin'])->name('login');
Route::post('/login', [AuthController::class , 'login'])->name('login.post');
Route::get('/register', [AuthController::class , 'showRegister'])->name('register');
Route::post('/register', [AuthController::class , 'register'])->name('register.post');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

// Admin Auth
Route::get('admin/login', [AdminAuthController::class , 'showLogin'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class , 'login'])->name('admin.login.post');
Route::post('admin/logout', [AdminAuthController::class , 'logout'])->name('admin.logout');

Route::middleware([\App\Http\Middleware\AdminAuth::class])->group(function () {
    Route::resource('admin/workshops', WorkshopController::class);
    Route::get('admin/workshops/{workshop}/export', [WorkshopController::class , 'exportCsv'])->name('workshops.export');
    Route::delete('admin/registrations/{registration}', [RegistrationController::class , 'destroy'])->name('registrations.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('workshops/{workshop}/register', [RegistrationController::class , 'create'])->name('workshops.register');
    Route::post('workshops/{workshop}/register', [RegistrationController::class , 'store'])->name('workshops.register.store');
});
