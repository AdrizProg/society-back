<?php

namespace App\Http\Controllers\Api\v1;

use Orion\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use DisablePagination;
    use DisableAuthorization;
    protected $model = Pedido::class;

    public function index(Request $request)
    {
        $query = Pedido::query();

        if ($request->has('estado')) {
            $query->where('estado', $request->input('estado'));
        }

        // Paginación
        $pedido = $query->paginate(10); // Cambia el número según necesites

        return response()->json($pedido);
    }

}
