<?php

namespace App\Http\Controllers\Api\v1;

use Auth;
use Illuminate\Foundation\Auth\User;
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
    // use DisableAuthorization;
    protected $model = Asociacion::class;

    public function index(Request $request)
    {
        $query = Asociacion::where('aprobados', 1);

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
        $user = Auth::user();

        // Verifica si el usuario es admin
        $esAdmin = User::where('admin', 1)->where('id', $user->id)->exists();

        if ($esAdmin) {
            return response()->json(Asociacion::where('aprobados', 0)->get());
        }

        return response()->json(['error' => 'No autorizado'], 403);
    }
    public function aprobados($id)
    {
        $asociacion = Asociacion::findOrFail($id);
        $asociacion->update(['aprobados' => 1]);
        $asociacion->refresh();
        return response()->json(['message' => 'Asociacion aprovada', 'data' => $asociacion]);
    }



}
