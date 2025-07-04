<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout (khusus user login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/', [TambangController::class, 'home'])->name('home');
    Route::get('/contact', fn() => view('contact'));
    Route::get('/about', fn() => view('about', ['title' => 'About Us']));
    Route::get('/tambang', [TambangController::class, 'index'])->name('tambang.index');
    Route::get('/detail/{kode_tambang}', [TambangController::class, 'show'])->name('tambang.show');

    // User bisa lihat daftar user
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Admin & Superadmin bisa kelola tambang
    Route::middleware('role:admin,superadmin')->group(function () {
        Route::get('/tambang_create', [TambangController::class, 'create'])->name('tambang.create');
        Route::post('/tambang/store', [TambangController::class, 'store'])->name('tambang.store');
        Route::get('/tambang/edit/{kode_tambang}', [TambangController::class, 'edit'])->name('tambang.edit');
        Route::put('/tambang/update/{kode_tambang}', [TambangController::class, 'update'])->name('tambang.update');
        Route::delete('/tambang/delete/{kode_tambang}', [TambangController::class, 'destroy'])->name('tambang.destroy');
        Route::delete('/tambang/gambar/{id}', [TambangController::class, 'deleteImage'])->name('tambang.gambar.destroy');
    });

    // Hanya Superadmin yang bisa kelola user
    Route::middleware('role:superadmin')->group(function () {
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Admin & Superadmin bisa akses halaman edit user
    Route::middleware('role:admin,superadmin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    });
});

// Reset Password
Route::get('/reset-password', function() {
    return view('auth.reset-password');
})->name('password.reset.form');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset.manual');
