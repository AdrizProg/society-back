<?php

use App\Http\Controllers\Api\v1\CategoriaController;
use App\Http\Controllers\Api\v1\CategoriaHasProductoController;
use App\Http\Controllers\Api\v1\ComentarioController;
use App\Http\Controllers\Api\v1\ImagenController;
use App\Http\Controllers\Api\v1\PedidoController;
use App\Http\Controllers\Api\v1\ProductoController;
use App\Http\Controllers\Api\v1\ProductoHasPedidoController;
use App\Http\Controllers\Api\v1\RopaHasProductoController;
use App\Http\Controllers\Api\v1\RopaTipoProductoController;
use App\Http\Controllers\Api\v1\UserHasAsociacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\v1\AsociacionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api.'], function () {
    // Tablas Generales
    Orion::resource('asociaciones', AsociacionController::class);
    Orion::resource('categorias', CategoriaController::class);
    Orion::resource('producto', ProductoController::class);
    Orion::resource('comentarios', ComentarioController::class);
    Orion::resource('imagenes', ImagenController::class);
    Orion::resource('pedidos', PedidoController::class);
    // Tablas relacionadas (1:N)
    // Orion::hasManyResource('user', 'asociaciones', UserAsociacionesController::class);
    // Orion::hasManyResource('producto', 'comentarios', ProductoComentariosController::class);
    // Tablas intermedia (N:M)

    // Orion::hasManyThroughResource('categorias', 'productos', CategoriaHasProductoController::class);
    // Posible arreglo 
    Orion::belongsToManyResource('categorias', 'productos', CategoriaController::class);
    Orion::belongsToManyResource('productos', 'categorias', ProductoController::class);

    Orion::hasManyThroughResource('productos', 'pedidos', ProductoHasPedidoController::class);
    Orion::hasManyThroughResource('ropas', 'productos', RopaHasProductoController::class);
    Orion::hasManyThroughResource('ropas', 'tipo_productos', RopaTipoProductoController::class);
    Orion::hasManyThroughResource('users', 'asociaciones', UserHasAsociacionController::class);

    // Orion::resource('categoriaHasProductos', CategoriaHasProductoController::class);
    // Orion::resource('productoHasPedidos', ProductoHasPedidoController::class);
    // Orion::resource('ropaHasProductos', RopaHasProductoController::class);
    // Orion::resource('ropaTipoProductos', RopaTipoProductoController::class);
    // Orion::resource('userHasAsociaciones', UserHasAsociacionController::class);

});
