<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
{
    $user = Auth::user();

    // Eliminar todos los tokens del usuario
    $user->tokens()->delete();

    // Cerrar la sesión del usuario
    Auth::guard('web')->logout();

    // Invalidar la sesión actual
    $request->session()->invalidate();

    // Regenerar el token de sesión
    $request->session()->regenerateToken();

    // Devolver una respuesta JSON indicando que el logout fue exitoso
    return response()->json(['message' => 'Logged out successfully']);
}
}