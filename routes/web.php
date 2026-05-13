<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// 2. Halaman Dashboard (Papar To-Do List)
Route::get('/dashboard', [TaskController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. Semua Fungsi To-Do & Profile (Perlu Login)
Route::middleware('auth')->group(function () {
    // Fungsi To-Do
    Route::post('/tambah', [TaskController::class, 'store']);
    Route::post('/check/{id}', [TaskController::class, 'check']);
    Route::delete('/padam/{id}', [TaskController::class, 'destroy']);
    
    // Fungsi Profile (Jangan padam baris bawah ni supaya tak error!)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Untuk paparkan halaman edit
Route::get('/edit/{id}', [TaskController::class, 'edit']);

// Untuk simpan nama tugasan baru
Route::put('/kemaskini/{id}', [TaskController::class, 'update']);
});

require __DIR__.'/auth.php';