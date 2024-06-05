<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        } else {
            $usuario->load('lista');

            $token = $usuario->createToken($usuario->nombre)->plainTextToken;
            return response()->json(['token' => $token,'usuario' => $usuario]);
        }
    }

    public function user(Request $request)
    {
        $usuario = $request->user();

        if ($usuario) {
            $usuario->load('lista');

            return response()->json($usuario);
        } else {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
    }

    public function logout(Request $request){
        $usuario = Usuario::where('email', $request->email)->first();
        $usuario->tokens()->delete();

        return response()->json(['message' => 'Logout exitoso']);
    }
}
