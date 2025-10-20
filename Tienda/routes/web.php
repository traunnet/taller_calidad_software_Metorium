<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthSimuladoController;

Route::get('/', function () {
    return view('home'); // índice principal público
})->name('home');

// Recursos existentes
Route::resource('categorias', CategoriaController::class);
Route::resource('productos', ProductoController::class);

// Rutas de login simulado
Route::get('/login', [AuthSimuladoController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthSimuladoController::class, 'doLogin'])->name('login.attempt');
Route::post('/logout', [AuthSimuladoController::class, 'logout'])->name('logout');

// Dashboard (protegido por middleware simulado 'sim.auth')
Route::get('/admin/dashboard', [AuthSimuladoController::class, 'dashboard'])
    ->name('admin.dashboard')->middleware('sim.auth');
