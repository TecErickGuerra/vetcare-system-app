<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\PetController;

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__.'/auth.php';

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ==================== RUTAS DE ADMINISTRACIÓN ====================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Gestión de Usuarios - RUTAS COMPLETAS
    Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
});

// ==================== RUTAS DE MASCOTAS ====================
Route::middleware(['auth'])->group(function () {
    // Gestión de Mascotas - RUTAS COMPLETAS
    Route::get('pets', [PetController::class, 'index'])->name('pets.index');
    Route::get('pets/create', [PetController::class, 'create'])->name('pets.create');
    Route::post('pets', [PetController::class, 'store'])->name('pets.store');
    Route::get('pets/{pet}', [PetController::class, 'show'])->name('pets.show');
    Route::get('pets/{pet}/edit', [PetController::class, 'edit'])->name('pets.edit');
    Route::put('pets/{pet}', [PetController::class, 'update'])->name('pets.update');
    Route::delete('pets/{pet}', [PetController::class, 'destroy'])->name('pets.destroy');
    
    // Ruta adicional para mascotas del usuario actual
    Route::get('my-pets', [PetController::class, 'myPets'])->name('pets.my-pets');
});