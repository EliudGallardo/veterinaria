<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {

    // Login
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

    // Registro
    Route::get('/registro', [AuthController::class, 'registro'])->name('registro');
    Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');

});


Route::middleware('auth')->group(function () {

    Route::get('/home', [AuthController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Editar usuario
    Route::get('/usuarios/{id}/editar', [AuthController::class, 'editarUsuario'])
        ->name('usuarios.editar');

    // Actualizar usuario
    Route::put('/usuarios/{id}/actualizar', [AuthController::class, 'actualizarUsuario'])
        ->name('usuarios.actualizar');

    // Activar/Desactivar usuario
    Route::post('/usuarios/activar/{id}', [AuthController::class, 'activarUsuario'])
        ->name('usuarios.activar');

    // Cambiar contraseña (form)
    Route::get('/usuarios/{id}/password', [AuthController::class, 'cambiarPassword'])
        ->name('usuarios.password');

    // Cambiar contraseña (actualizar)
    Route::put('/usuarios/{id}/password', [AuthController::class, 'actualizarPassword'])
        ->name('usuarios.password.update');
});
