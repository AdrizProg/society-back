<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        // 1) Autenticar
        $request->authenticate();

        // 2) (Opcional) Regenerar sesión (más usado si usarás cookies/sesión).
        //    Puedes quitarlo si vas a usar SOLAMENTE tokens y no cookies.
        $request->session()->regenerate();

        // 3) Obtener el usuario autenticado
        // ó $user = $request->user();

        // 4) Generar el token con Sanctum
        $tokenResult = $request->user()->createToken('myTokenName');
        $token = $tokenResult->plainTextToken;

        // 5) Devolver respuesta con el token
        return response()->json([
            'message' => 'Login exitoso',
            'token'   => $token,
            'user'    => Auth::user(),
        ]);
    }

    public function destroy(Request $request): Response
    {
        // Aquí puedes también revocar el token o simplemente cerrar sesión
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->noContent();
    }
}