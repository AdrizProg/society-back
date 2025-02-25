<?php

namespace App\Http\Controllers\Api\v1;

use Orion\Http\Controllers\Controller;
use App\Models\Producto;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    use DisablePagination;
    use DisableAuthorization;

    protected $model = Producto::class;

    public function index(Request $request)
    {
        $query = Producto::query();

        if ($request->has('precio')) {
            $query->where('precio', '<', $request->input('precio'));
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
