<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Producto;
use Orion\Http\Controllers\Controller;
use App\Models\ProductoHasPedido;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class ProductoHasPedidoController extends RelationController
{
    use DisablePagination;
    use DisableAuthorization;

    protected $model = Producto::class;

    protected $relation = 'pedidos'; 
}
