<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar las credenciales
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken; // Crear un token

            return response()->json([
                'token' => $token,
                'user' => $user,
            ]);
        }

        // Si la autenticación falla, devolver un error JSON
        return response()->json(['error' => 'Credenciales inválidas'], 401);
    }
}