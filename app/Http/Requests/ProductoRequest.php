<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class ProductoRequest extends Request
{
    public function generalRules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ];
    }
}
