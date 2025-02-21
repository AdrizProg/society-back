<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class ProductoComentariosController extends RelationController
{

    use DisablePagination;
    use DisableAuthorization;
    protected $model = Producto::class;

    protected $relation = 'comentarios';
}
