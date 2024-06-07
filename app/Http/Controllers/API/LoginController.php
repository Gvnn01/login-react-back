<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function Login(Request $request) {
        $request->validate([
            "login" => ["required", "string", "max:191"],
            "password" => ["required", "string", "max:191"]
        ]);

        if (ENV('USER_LOGIN') != $request->login) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Usuário não encontrado'
            ], 400);
        }
        if (ENV('USER_PASSWORD') != $request->password) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Senha incorreta'
            ], 400);
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'Login realizado com sucesso!'
        ], 200);
    }
}
