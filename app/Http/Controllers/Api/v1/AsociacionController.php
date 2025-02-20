<?php

namespace App\Http\Controllers\Api\v1;

use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller;
use App\Models\Asociacion;
use Illuminate\Http\Request;

class AsociacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Orion
    // use DisablePagination;
    // use DisableAuthorization;
    protected $model = Asociacion::class;

    public function index(Request $request)
    {
        $query = Asociacion::query();

        if ($request->has('tipo')) {
            $query->where('tipo', $request->input('tipo'));
        }

        if ($request->has('search')) {
            $query->where('nombre', 'LIKE', '%' . $request->input('search') . '%')
                ->orderBy('nombre', 'ASC');

        }

        // Paginación
        $asoci = $query->paginate(10); // Cambia el número según necesites

        return response()->json($asoci);
    }
}
