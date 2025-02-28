<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class ImagenRequest extends Request
{
    public function generalRules(): array
    {
        return [
            'producto_id' => 'required|exists:productos,id',
            'url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
