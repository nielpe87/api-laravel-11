<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        try {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {

                $token = Auth::user()->createToken("access_token");

                return ['token' => $token->plainTextToken];

            } else {
                return response()->json(['message'=> 'Não autorizado'],401);
            }

        } catch (\Throwable $th) {
            $response = [
                "error" => "Erro tente novamente",
                "code" => 39998732,
            ];
            return response()->json($th->getMessage(), 500);
        }
    }

    public function logout(){

        try {
            //code...
            Auth::user()->tokens()->delete();

            return response()->json(["message"=> "token revogado"],200);
        } catch (\Throwable $th) {
            return response()->json(["message"=> $th->getMessage()],500);
        }
    }
}
