<?php

namespace App\Http\Controllers\Api\v1;

use Orion\Http\Controllers\Controller;
use App\Models\Categoria;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class CategoriaController extends Controller
{
    use DisablePagination;
    use DisableAuthorization;

    protected $model = Categoria::class;
}
