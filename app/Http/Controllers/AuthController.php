<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Obtener el CSRF token
    public function getCsrfToken(Request $request)
    {
        return response()->json(['csrf_token' => csrf_token()]);
    }

    // Registro de usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User created successfully']);
    }

    // Inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json(['message' => 'Logged in']);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();  // Invalida la sesión
        $request->session()->regenerateToken();  // Regenera el token CSRF
        
        // Forzar la eliminación de la cookie de sesión
        return response()->noContent();
    }
}
