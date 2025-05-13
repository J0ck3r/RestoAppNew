<?php

use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Account\SecurityController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboard;
use App\Http\Controllers\Restaurant\DashboardController as RestaurantDashboard;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Admin-Backoffice
Route::middleware(['auth','role.admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){
        Route::get('/dashboard', [AdminDashboard::class,'index'])->name('dashboard');
    });

// Owner-Backoffice
Route::middleware(['auth','role.owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function(){
        Route::get('/dashboard',[OwnerDashboard::class,'index'])->name('dashboard');
    });

// Restaurant-Backoffice
Route::middleware(['auth','role.restaurant'])
    ->prefix('restaurant')
    ->name('restaurant.')
    ->group(function(){
        Route::get('/dashboard',[RestaurantDashboard::class,'index'])->name('dashboard');
    });

// Besucher-Dashboard (verified + Visitor-Rolle)
Route::middleware(['auth','verified','role:Visitor'])
    ->get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

// Landing-Page
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

// Account-Profile & Security (shared für alle angemeldeten Benutzer)
Route::middleware(['auth','verified'])
    ->group(function(){
        Route::get('/account/profile',[ProfileController::class,'show'])->name('profile.show');
        Route::patch('/account/profile',[ProfileController::class,'update'])->name('profile.update');
        Route::delete('/account/profile',[ProfileController::class,'destroy'])->name('profile.destroy');
        Route::get('/account/security',[SecurityController::class,'show'])->name('security.show');
    });

// Auth-Routen
require __DIR__.'/auth.php';
