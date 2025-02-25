<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Asociacion;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class AsociacionesProductoController extends RelationController
{
    use DisablePagination;
    use DisableAuthorization;

    protected $model = Asociacion::class;

    protected $relation = 'producto'; 
}
