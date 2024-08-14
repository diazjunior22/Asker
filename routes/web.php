<?php

// use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; // Asegúrate de importar el controlador correcto
use App\Http\Controllers\MeseroController ;
use App\Http\Controllers\MesaController ;

use App\Models\Mesa;

// Ruta para mostrar la página de inicio de sesión
Route::get('/', [LoginController::class, "principal"])->name('login');

// Ruta para mostrar la página de registro
// Route::view('/registro', 'registro')->name('registro');

// Ruta para mostrar la página privada (necesitarás protegerla con middleware más adelante)
Route::view('/privado', 'admin.secret')->middleware("auth") //middleware seguridad para que entren si o si por login
->name('privada');

Route::get('asker/meseroMesas', [MeseroController::class, "inicio"])->middleware("auth") //middleware seguridad para que entren si o si por login
->name('user');


//ruta para mostrar las comidas
Route::get('/mesa/Mesa:{id}/Productos/{categoria?}', [MeseroController::class, 'productos'])->name('mesa.show')->middleware("auth");



Route::view('/cajero', 'cajero.cajero')->middleware("auth") 
->name('cajero');


// Ruta para manejar el registro de usuarios
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');

// Ruta para manejar el inicio de sesión
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');

// Ruta para manejar el cierre de sesión
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// routes/web.php

// routes/web.php
//ruta para mostrar un solo producto{}
Route::get('/Mesa/{mesaId}/Producto:/{productoId}', [MeseroController::class, 'show'])->name('producto.show')->middleware("auth");
