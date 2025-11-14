<?php

use domain\AdminAuth\Controllers\AdminAuthController;
use domain\Dashboard\Controllers\Admin\DashboardController;
use domain\Dashboard\Controllers\Admin\SchoolController;
use domain\Dashboard\Controllers\Admin\UserController;
use domain\Paper\Controllers\PaperController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/force-logout', function () {
    Auth::logout();            // Log out current user
    request()->session()->invalidate();   // Clear session
    request()->session()->regenerateToken(); // Regenerate CSRF token
    return redirect('/login'); // Redirect to user login page
})->name('force.logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin dashboard & logout (role = admin)
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        // Users (nested under admin)
        Route::prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('index');
                Route::get('/create', [UserController::class, 'create'])->name('create');
                Route::post('/store', [UserController::class, 'store'])->name('store');
                Route::get('/{user}/show', [UserController::class, 'show'])->name('show');
                Route::put('/{user}/passwordUpdate', [UserController::class, 'passwordUpdate'])->name('password.update');
                Route::put('/{user}/update', [UserController::class, 'update'])->name('update');
                Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('destroy');
            });

        Route::prefix('schools')
            ->name('schools.')
            ->group(function () {
                Route::get('/', [SchoolController::class, 'index'])->name('index');
                Route::get('/create', [SchoolController::class, 'create'])->name('create');
                Route::post('/store', [SchoolController::class, 'store'])->name('store');
                Route::get('/{school}/show', [SchoolController::class, 'show'])->name('show');
                Route::put('/{school}/update', [SchoolController::class, 'update'])->name('update');
                Route::delete('/{school}/delete', [SchoolController::class, 'destroy'])->name('destroy');
            });

    });


Route::middleware(['auth', 'role:user'])
    ->prefix('papers')
    ->name('papers.')
    ->group(function () {
        Route::get('/', [PaperController::class, 'index'])->name('index');
        Route::get('/create', [PaperController::class, 'create'])->name('create');
        Route::post('/store', [PaperController::class, 'store'])->name('store');
        Route::get('/{paper}/show', [PaperController::class, 'show'])->name('show');
        Route::put('/{paper}/update', [PaperController::class, 'update'])->name('update');
        Route::delete('/{paper}/delete', [PaperController::class, 'destroy'])->name('destroy');

    });

Route::get('/papers/check-name', [PaperController::class, 'checkName'])
    ->name('papers.checkName');




require __DIR__.'/auth.php';
