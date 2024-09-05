<?php

// use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; // Asegúrate de importar el controlador correcto
use App\Http\Controllers\MeseroController ;
use App\Http\Controllers\MesaController ;
use App\Http\Controllers\CarritoController ;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\AdmControllerController;



use App\Models\Mesa;
//ruta para ver mi usuario
// web.php
Route::get('/meseroPerfil/{id}', [MeseroController::class, 'VerPerfil'])->name('perfil');


// Ruta para mostrar la página de inicio de sesión
Route::get('/', [LoginController::class, "principal"])->name('login');

// Ruta para mostrar la página de registro
// Route::view('/registro', 'registro')->name('registro');

//!Ruta para mostrar la página privada (necesitarás protegerla con middleware más adelante)  RUTA DEL ADMINISTRADOR
// Route::view('/privado', 'admin.secret')->middleware("auth") //middleware seguridad para que entren si o si por login
// ->name('privada');
Route::get('/admin/users', [AdmController::class, 'index'])->name('admin.index');
Route::get('/users/create', [AdmController::class, 'create'])->name('users.create');
Route::post('/users', [AdmController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [AdmController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [AdmController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [AdmController::class, 'destroy'])->name('users.destroy');

//!----------------------------------------------------------------------------------------------

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



Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito/{mesa_id}', [CarritoController::class, 'mostrarCarrito'])->name('carrito.mostrar');
Route::post('/carrito/checkout', [CarritoController::class, 'checkout'])->name('carrito.checkout');
// Ruta para eliminar productos del carrito
Route::delete('/carrito/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
// Ruta para editar productos del carrito
Route::put('/carrito/{id}', [CarritoController::class, 'editar'])->name('carrito.editar');
Route::get('/carrito/{id}/editar', [CarritoController::class, 'mostrarEdicion'])->name('carrito.editar.form');


// Ruta para mostrar los pedidos al chef



Route::get('/chef/pedidos', [PedidosController::class, 'index'])->name('chef.pedidos');
Route::get('/chef/pedidos/{id}', [PedidosController::class, 'show'])->name('mostrar.pedido');
Route::delete('pedidos/{id}', [PedidosController::class, 'destroy'])->name('pedidos.destroy');

