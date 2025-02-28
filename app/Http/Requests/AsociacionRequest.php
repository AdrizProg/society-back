<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class AsociacionRequest extends Request
{
    public function generalRules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'nif' => 'nullable|string|max:9',
            'direccion' => 'nullable|string|max:255',
            'imagenPrincipal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
