<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController; // Pastikan controller ini wujud

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
    
    // --- FUNGSI TO-DO ---
    // --- FUNGSI TO-DO ---
// Pastikan nama route (->name) sepadan dengan apa yang dipanggil di blade
Route::post('/tambah', [TaskController::class, 'store'])->name('todo.store'); 
Route::post('/check/{id}', [TaskController::class, 'check'])->name('todo.update');
Route::delete('/padam/{id}', [TaskController::class, 'destroy'])->name('todo.destroy');
Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('todo.edit');
Route::put('/kemaskini/{id}', [TaskController::class, 'update'])->name('todo.save');
    
    // --- FUNGSI PROFILE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';