<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;

class ComentariosProductoController extends RelationController
{

    use DisablePagination;
    use DisableAuthorization;
    protected $model = Comentario::class;

    protected $relation = 'producto';
}
