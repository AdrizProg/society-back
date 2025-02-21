<?php

namespace App\Http\Controllers\Api\v1;

use Orion\Http\Controllers\Controller;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use DisablePagination;
    use DisableAuthorization;
    protected $model = Imagen::class;

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'nullable|file|image|max:1048',
            'producto_id' => 'required|exists:productos,id'
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('image-producto', 'public');

            $imagen = Imagen::create([
                'url' => $path,
                'producto_id' => $request->producto_id
            ]);

            return response()->json([
                'message' => 'éxito',
                'url' => asset('storage/' . $path),
                'imagen' => $imagen
            ], 201);
        }

    }
}
