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
use App\Http\Controllers\Api\v1\UserController;
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
    Orion::resource('user', UserController::class);
    Orion::resource('categorias', CategoriaController::class);
    Orion::resource('producto', ProductoController::class);
    Orion::resource('comentarios', ComentarioController::class);
    Orion::resource('imagenes', ImagenController::class);
    Orion::resource('pedidos', PedidoController::class);
    // Tablas relacionadas (1:N)
    // Orion::hasManyResource('user', 'asociaciones', UserAsociacionesController::class);
    // Orion::hasManyResource('producto', 'comentarios', ProductoComentariosController::class);
    // Tablas relacionadas (N:M)
    Orion::belongsToManyResource('categorias', 'productos', CategoriaController::class);
    Orion::belongsToManyResource('productos', 'categorias', ProductoController::class);

    Orion::belongsToManyResource('producto', 'pedidos', ProductoController::class);
    Orion::belongsToManyResource('pedidos', 'productos', PedidoController::class);

    Orion::belongsToManyResource('ropas', 'productos', RopaTipoProductoController::class);
    Orion::belongsToManyResource('producto', 'ropas', ProductoController::class);

    Orion::belongsToManyResource('user', 'asociaciones', UserController::class);
    Orion::belongsToManyResource('asociaciones', 'user', AsociacionController::class);

});
