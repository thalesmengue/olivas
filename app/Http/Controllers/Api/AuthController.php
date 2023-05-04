<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Credenciais inválidas!'
            ], 401);
        }

        $user = request()->user();
        $token = $user->createToken('token');

        return response()->json([
           'user' => $user,
           'token' => $token->plainTextToken
        ]);
    }
}
