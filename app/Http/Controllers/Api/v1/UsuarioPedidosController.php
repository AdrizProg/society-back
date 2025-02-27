<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class UsuarioPedidosController extends RelationController
{
    use DisablePagination;
    use DisableAuthorization;

    protected $model = User::class;

    protected $relation = 'pedido'; 
}
