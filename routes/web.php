<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\DevolucionController;

Route::get('/', [DashboardController::class, 'index']);
Route::resource('equipos', EquipoController::class);
Route::resource('solicitantes', SolicitanteController::class);
Route::resource('prestamos', PrestamoController::class)->only(['index', 'create', 'store']);
Route::patch('prestamos/{prestamo}/devolucion', [DevolucionController::class, 'update'])->name('prestamos.devolucion');