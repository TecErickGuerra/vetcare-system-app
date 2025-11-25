<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación (Breeze)
require __DIR__.'/auth.php';

// SOLO ESTA RUTA POR AHORA
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// COMENTA TEMPORALMENTE TODAS LAS OTRAS RUTAS