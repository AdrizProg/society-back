<?php

use App\Http\Controllers\Api\v1\AsociacionesProductoController;
use App\Http\Controllers\Api\v1\AsociacionHasUserController;
use App\Http\Controllers\Api\v1\CategoriaController;
use App\Http\Controllers\Api\v1\CategoriaHasProductoController;
use App\Http\Controllers\Api\v1\ComentarioController;
use App\Http\Controllers\Api\v1\ComentariosProductoController;
use App\Http\Controllers\Api\v1\ImagenController;
use App\Http\Controllers\Api\v1\PedidoController;
use App\Http\Controllers\Api\v1\PedidoHasProductoController;
use App\Http\Controllers\Api\v1\ProductoComentariosController;
use App\Http\Controllers\Api\v1\ProductoController;
use App\Http\Controllers\Api\v1\ProductoHasCategoriaController;
use App\Http\Controllers\Api\v1\ProductoHasPedidoController;
use App\Http\Controllers\Api\v1\ProductoHasRopaController;
use App\Http\Controllers\Api\v1\ProductosAsociacionesController;
use App\Http\Controllers\Api\v1\RopaHasProductoController;
// use App\Http\Controllers\Api\v1\RopaTipoProductoController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\UserHasAsociacionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\v1\AsociacionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');

// Subir Imagenes
Route::post('/imagenes', [ImagenController::class, 'store']);

// Optener las asociaciones que estan pendientes para el panel de user
Route::get('/asociaciones/pendientes', [AsociacionController::class, 'pendientes']);
// Actualizar la asociacion para que se apruebe o se rechace
Route::put('/asociaciones/{id}/aprobados', [AsociacionController::class, 'aprobados']);

Route::group(['as' => 'api.'], function () {

    // Tablas Generales
    Orion::resource('asociaciones', AsociacionController::class);
    Orion::resource('users', UserController::class); // Revisar autenticacion, fallo.
    Orion::resource('categorias', CategoriaController::class);
    Orion::resource('productos', ProductoController::class);
    Orion::resource('comentarios', ComentarioController::class);
    Orion::resource('imagenes', ImagenController::class);
    Orion::resource('pedidos', PedidoController::class);
    // Tablas relacionadas

    // Relaciones productos con comentarios y comentarios con productos
    Orion::hasManyResource('productos', 'comentarios', ProductoComentariosController::class);
    Orion::hasManyResource('comentarios', 'productos', ComentariosProductoController::class);

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
    Orion::hasManyThroughResource('asociaciones', 'users', AsociacionHasUserController::class);
});