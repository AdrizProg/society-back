<?php

namespace App\Http\Controllers\Api\v1;

use Orion\Http\Controllers\Controller;
use App\Models\ProductoHasPedido;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class ProductoHasPedidoController extends Controller
{
    use DisablePagination;
    use DisableAuthorization;

    protected $model = ProductoHasPedido::class;

    protected $relations = ['pedido', 'producto']; // Relación corregida
}
