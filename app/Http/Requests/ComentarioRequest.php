<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class ComentarioRequest extends Request
{
    public function generalRules(): array
    {
        return [
            'producto_id' => 'required|exists:productos,id',
            'usuario_id' => 'required|exists:users,id',
            'text' => 'nullable|string|max:250',
            'valoracion' => 'required|in:1,2,3,4,5',
        ];
    }
}
