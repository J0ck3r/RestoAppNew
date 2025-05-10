<?php

use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Account\SecurityController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/register/{role}', [RegisterController::class, 'showRegistrationForm'])
    ->where('role', 'owner|visitor')
    ->name('register.role');

Route::post('/register/{role}', [RegisterController::class, 'register'])
    ->where('role', 'owner|visitor');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/account/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/account/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Security
    Route::get('/account/security', [SecurityController::class, 'show'])->name('security.show');
});

require __DIR__.'/auth.php';
