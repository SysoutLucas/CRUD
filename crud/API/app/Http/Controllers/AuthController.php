<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
    public function __construct() {
        
    }

    public function login(Request $request){
        
    	$validator = Validator::make($request->all(), [
            'login' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
            
        if ($validator->fails()) {
            
            return response()->json(array_merge(["errors" => $validator->errors()->all()],["sucesso" => 0, "message" => "dados inválidos"]), 200);
        }
            
        if (! $token = auth('api')->attempt($validator->validated())) {
            return response()->json(['message' => 'Não autorizado','sucesso' => 0], 200);
        }
    
        return $this->createNewToken($token);
    }

    public function register(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'login' => 'required|string|email|max:100|unique:users,login',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()){
            
            return response()->json(array_merge(["errors" => $validator->errors()->all()],["sucesso" => 0, "message" => "Dados inválidos"]), 200);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    [
                        'password' => bcrypt($request->password),
                        'status' => 1
                    ]
                ));

        return response()->json([
            'sucesso' => 1,
            'message' => 'Usuário cadastrado com sucesso',
            'user' => $user
        ], 201);
    }

    public function logout() {
        auth('api')->logout();

        return response()->json(['message' => 'Logout realizado', "sucesso" => 1]);
    }

    public function refresh() {
        return $this->createNewToken(auth('api')->refresh());
    }

    public function userProfile() {
        return response()->json(auth('api')->user());
    }

    protected function createNewToken($token){
        return response()->json([
            'sucesso' => 1,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user()
        ]);
    }

}
