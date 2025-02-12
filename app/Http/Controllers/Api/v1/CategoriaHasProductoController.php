<?php

namespace App\Http\Controllers\Api\v1;

use Orion\Http\Controllers\Controller;
use App\Models\CategoriaHasProducto;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class CategoriaHasProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use DisablePagination;
    use DisableAuthorization;
    protected $model = CategoriaHasProducto::class;

    protected $relation = 'producto';
}
