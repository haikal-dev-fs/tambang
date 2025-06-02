<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambangController;

Route::get('/', function () {
    return view('home', ['title' => 'Dashboard']);
});

Route::get('/tambang', [TambangController::class, 'index'])->name('tambang');

Route::get('/detail/{kode_tambang}', [TambangController::class, 'show'])->name('tambang.show');


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

