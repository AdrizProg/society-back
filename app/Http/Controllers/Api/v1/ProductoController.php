<?php

namespace App\Http\Controllers\Api\v1;

use Orion\Http\Controllers\Controller;
use App\Models\Producto;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class ProductoController extends Controller
{
    use DisablePagination;
    use DisableAuthorization;

    protected $model = Producto::class;

    protected $relations = ['pedidos']; // Relación corregida
}
