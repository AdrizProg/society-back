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
    use DisablePagination;
    use DisableAuthorization;
    protected $model = Asociacion::class;

    public function index(Request $request)
    {
        $query = Asociacion::where('aprovado', true);

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

    public function pendientes()
    {
        return response()->json(Asociacion::where('aprovado', false)->get());
    }

    public function aprovados($id)
    {
        $asociacion = Asociacion::findOrFail($id);
        $asociacion->update(['aprovado' => true]);
        return response()->json(['message' => 'Asociacion aprovada', 'data' => $asociacion]);
    }



}
