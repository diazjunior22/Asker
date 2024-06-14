<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; // Asegúrate de importar el controlador correcto

// Ruta para mostrar la página de inicio de sesión
Route::view('/', 'login')->name('login');

// Ruta para mostrar la página de registro
Route::view('/registro', 'registro')->name('registro');

// Ruta para mostrar la página privada (necesitarás protegerla con middleware más adelante)
Route::view('/privado', 'secret')->middleware("auth") //middleware seguridad para que entren si o si por login
->name('privada');

// Ruta para manejar el registro de usuarios
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');

// Ruta para manejar el inicio de sesión
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');

// Ruta para manejar el cierre de sesión
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');