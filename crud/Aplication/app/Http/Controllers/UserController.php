<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    public function __construct(){

    }


    public function autenticar(Request $request) {
        
        $response = Http::withToken($request->input('access_token'))->get('http://127.0.0.1:8000/api/auth/user-profile');
        if( $response->successful() ) {

            $data = $response->json();
            if(isset($data['user_id'])){
                $request->session()->put("access_token", $request->input('access_token'));
                foreach ($data as $key => $value) {
                    $request->session()->put($key, $value);
                }
                return response()->json(["status" => 1, "message" => "Autenticação realizada com sucesso"]);
            } 
            return response()->json(["status" => 0, "message" => "Falha ao autenticar"]);
            
        } else {
            return response()->json(["status" => 0, "message" => "Falha ao autenticar"]);
        }
    }

    public function home(){
        return view('home');
    }

    public function showLogin(){
        return view('login');
    }

    public function showRegister(Request $request){
        return view('cadastrar');
    }

    public function showEdit(Request $request, $id){
        $response = Http::withToken($request->session()->get('access_token'))->get('http://127.0.0.1:8000/api/users/show/'.$id);
        if( $response->successful() ) {
            $data = $response->json();
            
            if($data['sucesso'] == 1){
                return view('edit',["user" => $data['user'][0]]);
            }
        }
    }

    public function showList(Request $request){
        $response = Http::withToken($request->session()->get('access_token'))->get('http://127.0.0.1:8000/api/users');
        if( $response->successful() ) {
            $data = $response->json();
            if($data['sucesso'] == 1){
                return view('lista',["users" => $data['users']]);
            }
        }
    }

    public function store(Request $request, $id){
        
        $response = Http::withToken($request->session()->get('access_token'))->post('http://127.0.0.1:8000/api/users/update/'.$id,[
            "login" => $request->input('login'),
            "name" => $request->input('name')
        ]);
        if( $response->successful() ) {
            $data = $response->json();
            
            if($data['sucesso'] == 1){
                return response()->json(["sucesso" => 1, "message" => "Dados alterados com sucesso"]);
            }

            return response()->json(["sucesso" => 0, "message" => "Falha ao alterar os dados"]);
        } else {
            return response()->json(["sucesso" => 0, "message" => "Falha ao alterar os dados"]);
        }
    }
    public function destroy(Request $request, $id){
        $response = Http::withToken($request->session()->get('access_token'))->delete('http://127.0.0.1:8000/api/users/delete/'.$id);
        if( $response->successful() ) {
            $data = $response->json();
            
            if($data['sucesso'] == 1){
                return response()->json(["sucesso" => 1, "message" => "Deletado com sucesso"]);
            }
            return response()->json(["sucesso" => 0, "message" => "Falha ao alterar os dados"]);
        } else {
            return response()->json(["sucesso" => 0, "message" => "Falha ao alterar os dados"]);
        }
    }

    public function register(Request $request) {
        $response = Http::withToken($request->session()->get('access_token'))->post('http://127.0.0.1:8000/api/auth/register',[
            "login" => $request->input('login'),
            "name" => $request->input('name'),
            "password" => $request->input('password'),
            "password_confirmation" => $request->input('password_confirmation')
        ]);
        if( $response->successful() ) {
            $data = $response->json();
            
            if($data['sucesso'] == 1){
                return response()->json(["sucesso" => 1, "message" => "Cadastrado com sucesso"]);
            }
            return response()->json(["sucesso" => 0, "message" => "Falha ao cadastrar os dados"]);
        } else {
            return response()->json(["sucesso" => 0, "message" => "Falha ao cadastrar os dados"]);
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

}
