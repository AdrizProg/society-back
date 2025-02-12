<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\RopaHasProducto;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class RopaHasProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use DisablePagination;
    use DisableAuthorization;
    protected $model = RopaHasProducto::class;
}
