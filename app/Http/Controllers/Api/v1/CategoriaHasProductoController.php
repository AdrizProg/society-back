<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Categoria;
use Orion\Http\Controllers\Controller;
use App\Models\CategoriaHasProducto;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class CategoriaHasProductoController extends RelationController
{
    /**
     * Display a listing of the resource.
     */

    use DisablePagination;
    use DisableAuthorization;
    protected $model = Categoria::class;

    protected $relation = 'productos';
}
