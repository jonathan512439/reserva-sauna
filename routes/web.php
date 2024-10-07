<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Ruta para listar reservas en el dashboard
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
});

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Gestión de Perfil del Usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para la gestión de reservas
Route::middleware('auth')->group(function () {
    // Crear nueva reserva
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

    // Editar reserva
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');

    // Eliminar reserva
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});

// Archivo adicional de autenticación
require __DIR__.'/auth.php';
