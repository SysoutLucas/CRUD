<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        //$this->middleware('jwt.verify');
    }

    public function list(Request $request)
    {
        
        $users = User::where('status',1)->get();
        $retorno = [
            "sucesso" => 1,
            "users" => $users
        ];
        return response()->json($retorno);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'login' => 'required|string|email',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 200);
        }

        $user = User::find($id);
        if(!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 200);
        }

        $user->update($validator->validated());

        return response()->json([
            'sucesso' => 1,
            'message' => 'Dados alterados com sucesso',
            'user' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('status',1)->where('user_id',$id)->get();
        
        if(!$user) {
            return response()->json(['message' => 'Usuário não encontrado', "status" => 0], 200);
        }

        return response()->json([
            "sucesso" => 1,
            'user' => $user
        ], 200);
    }

   
    public function destroy($id)
    {
        $user = User::where('status',1)->where('user_id',$id);
        if(!$user) {
            return response()->json(['message' => 'Usuário não encontrado.', "sucesso" => 0], 200);
        }
        if( $user->update(['status' => 0]) ){
            return response()->json(['message' => 'Usuário deletado com sucesso.', "sucesso" => 1], 200);
        }
        return response()->json(['message' => 'Falha ao alterar os dados.', "sucesso" => 0], 400);
    }
}
