<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\RopaTipoProducto;
use Orion\Http\Controllers\Controller;
use App\Models\RopaHasProducto;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class RopaHasProductoController extends RelationController
{
    /**
     * Display a listing of the resource.
     */
    use DisablePagination;
    use DisableAuthorization;
    protected $model = RopaTipoProducto::class;

    protected $relation = 'productos';
}
