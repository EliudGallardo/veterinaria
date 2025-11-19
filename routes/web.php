<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitaController; 


Route::middleware('guest')->group(function () {

    
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

    
    Route::get('/registro', [AuthController::class, 'registro'])->name('registro');
    Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
});



Route::middleware('auth')->group(function () {

    
    Route::get('/home', [AuthController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    
    Route::get('/usuarios/{id}/editar', [AuthController::class, 'editarUsuario'])
        ->name('usuarios.editar');

    Route::put('/usuarios/{id}/actualizar', [AuthController::class, 'actualizarUsuario'])
        ->name('usuarios.actualizar');

    Route::post('/usuarios/activar/{id}', [AuthController::class, 'activarUsuario'])
        ->name('usuarios.activar');

    Route::get('/usuarios/{id}/password', [AuthController::class, 'cambiarPassword'])
        ->name('usuarios.password');

    Route::put('/usuarios/{id}/password', [AuthController::class, 'actualizarPassword'])
        ->name('usuarios.password.update');


   
    Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
    Route::get('/citas/nueva', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/citas/guardar', [CitaController::class, 'store'])->name('citas.store');
});
