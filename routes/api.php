<?php

use App\Http\Controllers\Api\v1\CategoriaController;
use App\Http\Controllers\Api\v1\CategoriaHasProductoController;
use App\Http\Controllers\Api\v1\ComentarioController;
use App\Http\Controllers\Api\v1\ImagenController;
use App\Http\Controllers\Api\v1\PedidoController;
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
    Orion::resource('asociaciones', AsociacionController::class);
    Orion::resource('categorias', CategoriaController::class);
    Orion::resource('categoriaHasProductos', CategoriaHasProductoController::class);
    Orion::resource('comentarios', ComentarioController::class);
    Orion::resource('imagenes', ImagenController::class);
    Orion::resource('pedidos', PedidoController::class);
    Orion::resource('productoHasPedidos', ProductoHasPedidoController::class);
    Orion::resource('ropaHasProductos', RopaHasProductoController::class);
    Orion::resource('ropaTipoProductos', RopaTipoProductoController::class);
    Orion::resource('userHasAsociaciones', UserHasAsociacionController::class);
});
