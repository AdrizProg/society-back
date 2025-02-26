<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Pedido;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class PedidoUsuariosController extends RelationController
{
    use DisablePagination;
    use DisableAuthorization;

    protected $model = Pedido::class;

    protected $relation = 'user'; 
}
