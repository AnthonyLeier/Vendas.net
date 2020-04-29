<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    function telaCadastro(){
        if(session()->has("login")){
            return view("tela_cadastro_cliente");
        }else{
            return redirect()->route('tela_login');
        }
    }

    function telaAlteracao($id){
        if(session()->has("login")){
            $cliente = Cliente::find($id);
            return view("tela_alterar_cliente", [ "c" => $cliente ]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function adicionar(Request $req){
        if(session()->has("login")){
        	$nome = $req->input('nome');
        	$login = $req->input('login');
        	$senha = $req->input('senha');

        	$cliente = new Cliente();
        	$cliente->nome = $nome;
        	$cliente->login = $login;
        	$cliente->senha = $senha;

        	if ($cliente->save()){
        		$msg = "Usuário $nome adicionado com sucesso.";
        	} else {
        		$msg = "Usuário não foi cadastrado.";
        	}

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function alterar(Request $req, $id){
        if(session()->has("login")){
            $cliente = Cliente::find($id);

            $nome = $req->input('nome');
            $login = $req->input('login');
            $senha = $req->input('senha');

            $cliente->nome = $nome;
            $cliente->login = $login;
            $cliente->senha = $senha;

            if ($cliente->save()){
                $msg = "Usuário $nome alterado com sucesso.";
            } else {
                $msg = "Usuário não foi alterado.";
            }

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function excluir($id){
        if(session()->has("login")){
            $cliente = Cliente::find($id);

            foreach($cliente->vendas as $v){
                $v->delete();
            }

            if ($cliente->delete()){
                $msg = "Usuário $id excluído com sucesso.";
            } else {
                $msg = "Usuário não foi excluído.";
            }

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function listar(){
        if(session()->has("login")){

            $clientes = Cliente::all();
            return view("lista_clientes", [ "listaClientes" => $clientes ]);
            
        }else{
            return redirect()->route('tela_login');
        }

    }
}