<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Todos los usuarios logueados pueden ver los productos
Route::get('/productos', [ProductoController::class, 'index'])
    ->middleware('auth')
    ->name('productos.index');

// Carrito y checkout (cualquier usuario logueado)
Route::middleware('auth')->group(function () {
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar/{producto}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
    Route::get('/checkout', [CarritoController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/confirmar', [CarritoController::class, 'confirmar'])->name('checkout.confirmar');
});

// Solo el admin gestiona productos, clientes, pedidos y ve las ventas
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('productos', ProductoController::class)->except(['index', 'show']);
    Route::resource('clientes', ClienteController::class);
    Route::resource('pedidos', PedidoController::class);
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
});
