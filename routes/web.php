<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return 'Bienvenido a VetCare - <a href="/login">Login</a>';
});

require __DIR__.'/auth.php';

// Dashboard con el controlador real
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ==================== RUTAS DE GESTIÓN (AÑADIR GRADUALMENTE) ====================

// Rutas REALES de administración
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
});

// Rutas REALES de mascotas
Route::middleware(['auth'])->group(function () {
    Route::get('/pets', [App\Http\Controllers\PetController::class, 'index'])->name('pets.index');
});

// ==================== RUTAS DE USUARIOS ====================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
});

// ==================== RUTAS DE MASCOTAS ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/pets', [App\Http\Controllers\PetController::class, 'index'])->name('pets.index');
    Route::get('/pets/create', [App\Http\Controllers\PetController::class, 'create'])->name('pets.create');
    Route::get('/pets/{pet}/edit', [App\Http\Controllers\PetController::class, 'edit'])->name('pets.edit');
});