<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Pedido;
use App\Models\Producto;
use Orion\Http\Controllers\Controller;
use App\Models\ProductoHasPedido;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class PedidoHasProductoController extends RelationController
{
    use DisablePagination;
    use DisableAuthorization;

    protected $model = Pedido::class;

    protected $relation = 'producto'; 
}
