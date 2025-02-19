<?php

use App\Http\Controllers\Api\v1\AsociacionesProductoController;
use App\Http\Controllers\Api\v1\CategoriaController;
use App\Http\Controllers\Api\v1\CategoriaHasProductoController;
use App\Http\Controllers\Api\v1\ComentarioController;
use App\Http\Controllers\Api\v1\ImagenController;
use App\Http\Controllers\Api\v1\PedidoController;
use App\Http\Controllers\Api\v1\PedidoHasProductoController;
use App\Http\Controllers\Api\v1\ProductoController;
use App\Http\Controllers\Api\v1\ProductoHasCategoriaController;
use App\Http\Controllers\Api\v1\ProductoHasPedidoController;
use App\Http\Controllers\Api\v1\ProductoHasRopaController;
use App\Http\Controllers\Api\v1\ProductosAsociacionesController;
use App\Http\Controllers\Api\v1\RopaHasProductoController;
use App\Http\Controllers\Api\v1\RopaTipoProductoController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\UserHasAsociacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\v1\AsociacionController;
use App\Http\Controllers\AuthController;

Route::get('/csrf-token', [AuthController::class, 'getCsrfToken']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::group(['as' => 'api.'], function () {
    // Tablas Generales
    Orion::resource('asociaciones', AsociacionController::class)->middleware('auth:sanctum');
    Orion::resource('users', UserController::class); // Revisar autenticacion, fallo.
    Orion::resource('categorias', CategoriaController::class);
    Orion::resource('productos', ProductoController::class);
    Orion::resource('comentarios', ComentarioController::class);
    Orion::resource('imagenes', ImagenController::class);
    Orion::resource('pedidos', PedidoController::class);
    // Tablas relacionadas (1:N)
    // Orion::hasManyResource('user', 'asociaciones', UserAsociacionesController::class);
    // Orion::hasManyResource('producto', 'comentarios', ProductoComentariosController::class);
    // Tablas intermedia (N:M)

    // Relaciones asociacion con productos y producto con asociaciones
    Orion::hasManyResource('asociaciones', 'productos', AsociacionesProductoController::class);
    Orion::hasManyResource('productos', 'asociaciones', ProductosAsociacionesController::class);

    // Relaciones categoria con productos y producto con categorias
    Orion::belongsToManyResource('categorias', 'productos', CategoriaHasProductoController::class);
    Orion::belongsToManyResource('productos', 'categorias', ProductoHasCategoriaController::class);

    // Relaciones producto con pedidos y pedido con productos
    Orion::hasManyThroughResource('productos', 'pedidos', ProductoHasPedidoController::class);
    Orion::hasManyThroughResource('pedidos', 'productos', PedidoHasProductoController::class);

    // Relaciones RopaTalla con productos y producto con RopaTalla
    Orion::hasManyThroughResource('ropas', 'productos', RopaHasProductoController::class);
    Orion::hasManyThroughResource('productos', 'ropas', ProductoHasRopaController::class);

    // Relacion Usuarios con asociaciones y asociaciones con usuarios
    Orion::hasManyThroughResource('users', 'asociaciones', UserHasAsociacionController::class);
    // Falta relacion inversa, revisar fallo
});
