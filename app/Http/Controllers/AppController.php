<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Auth;

class AppController extends Controller
{
    function tela_login(){
    	//Exibir tela de login
    	return view('tela_login');
    }

    function login(Request $req){
    	//Comparar usuário e senha
    	$login = $req->input('login');
    	$senha = $req->input('senha');

    	$cliente = Cliente::where('login', '=', $login)->first();
    	// $cliente terá null ou os dados do cliente encontrado

        if($cliente){
            $variavel = ["nome" => $cliente->nome, "login" => $login];
            session($variavel);

            if($cliente->senha == $senha){
                return redirect()->route('home');
            }else{
                return view("resultado", ["mensagem" => "Usuário ou senha inválidos."]);
            }

        }else{
            return view("resultado", ["mensagem" => "Usuário ou senha inválidos."]);
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
