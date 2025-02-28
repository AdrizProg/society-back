<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\ImagenRequest;
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
    protected $request = ImagenRequest::class;

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'nullable|file|image',
            'producto_id' => 'required|exists:productos,id'
        ]);

        if ($request->hasFile('url')) {
            $path = $request->file('url')->store('image-producto', 'public');

            $imagen = Imagen::create([
                'url' => $path,
                'producto_id' => $request->producto_id
            ]);

            return response()->json([
                'message' => 'éxito',
                'url' => asset('storage/' . $path),
                'imagen' => $imagen
            ], 201);

            // return response()->json(['error' => 'No se ha subido ninguna imagen'], 400);
        }

    }
}
