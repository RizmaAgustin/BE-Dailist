<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

// Endpoint login
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Menampilkan semua tugas milik user yang sedang login
    Route::get('/tasks', [TaskController::class, 'index']);

    // Menyimpan tugas baru
    Route::post('/tasks', [TaskController::class, 'store']);

    // Menampilkan detail tugas tertentu
    Route::get('/tasks/{id}', [TaskController::class, 'show']);

    // Mengupdate tugas
    Route::put('/tasks/{id}', [TaskController::class, 'update']);

    // Menghapus tugas
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
});
