<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\ComentarioRequest;
use Orion\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use DisablePagination;
    use DisableAuthorization;
    protected $model = Comentario::class;
    protected $request = ComentarioRequest::class;

    // public function index(Request $request)
    // {
    //     $query = Comentario::query();

    //     if ($request->has('valoracion')) {
    //         $query->where('valoracion', $request->input('valoracion'));
    //     }

    //     // Paginación
    //     $coment = $query->paginate(10); // Cambia el número según necesites

    //     return response()->json($coment);
    // }
}
