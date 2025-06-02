<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambangController;

Route::get('/', function () {
    return view('home', ['title' => 'Dashboard']);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

Route::get('/tambang', [TambangController::class, 'index'])->name('tambang.index');

// Tambang detail route
Route::get('/detail/{kode_tambang}', [TambangController::class, 'show'])->name('tambang.show');

// Route Tambah dan Simpan Data Tambang
Route::get('/tambang_create', [TambangController::class, 'create'])->name('tambang.create');
Route::post('/tambang/store', [TambangController::class, 'store'])->name('tambang.store');

// Update Edit Hapus Data Tambang
Route::get('/tambang/edit/{kode_tambang}', [TambangController::class, 'edit'])->name('tambang.edit');
Route::post('/tambang/update/{kode_tambang}', [TambangController::class, 'update'])->name('tambang.update');
Route::delete('/tambang/delete/{kode_tambang}', [TambangController::class, 'destroy'])->name('tambang.destroy');



