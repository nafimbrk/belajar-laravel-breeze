<?php

use App\Http\Controllers\CekController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cek1', function () {
    return '<h1>cek1</h1>';
})->middleware(['auth', 'verified']);

Route::get('/cek2', [CekController::class, 'index'])->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
