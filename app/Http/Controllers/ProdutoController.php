<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
use App\Produto;

class ProdutoController extends Controller
{
    function telaCadastro(){
        $listaTipos = Tipo::all();
        if(session()->has("login")){
            return view('tela_cadastro_produto', ["listaTipos" => $listaTipos]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function telaAlteracao($id){
        $listaTipos = Tipo::all();
        if(session()->has("login")){
            $produto = Produto::find($id);
            return view("tela_alterar_produto", [ "p" => $produto, "listaTipos" => $listaTipos ]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function adicionar(Request $req){
        if(session()->has("login")){
            $produto = new Produto();
            $produto->nome = $req->input('nome');
            $produto->descricao = $req->input('descricao');
            $produto->preco = $req->input('preco');
            $produto->unidade_venda = $req->input('unidade');
            $produto->id_tipo = $req->input('id_tipo');
        
            if ($produto->save()){
                $msg = "Produto $produto->nome adicionado com sucesso.";
            } else {
                $msg = "Produto não foi cadastrado.";
            }

            return view("resultado", [ "mensagem" => $msg]);            
        }else{
            return redirect()->route('tela_login');
        }
    }

    function listar(){
        if(session()->has("login")){
            $listaProdutos = Produto::all();
            return view('lista_produtos', ["lista" => $listaProdutos]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function alterar($id, Request $req){
        if(session()->has("login")){
            $produto = Produto::find($id);
            $produto->nome = $req->input('nome');
            $produto->descricao = $req->input('descricao');
            $produto->preco = $req->input('preco');
            $produto->unidade_venda = $req->input('unidade');
            $produto->id_tipo = $req->input('id_tipo');
        
            if ($produto->save()){
                $msg = "Produto $produto->nome alterado com sucesso";
            } else {
                $msg = "Produto não foi alterado";
            }

            return view("resultado", [ "mensagem" => $msg]);            
        }else{
            return redirect()->route('tela_login');
        }
    }

    function telaNovoTipo(){	
    	if(session()->has("login")){
    		return view('tela_cadastro_tipo');
    	}else{
    		return redirect()->route('tela_login');
    	}
    }

    function excluir($id){
        if(session()->has("login")){
            $produto = Produto::find($id);

            if ($produto->delete()){
                $msg = "Produto $id excluído com sucesso.";
            } else {
                $msg = "Produto não foi excluído.";
            }

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function novoTipo(Request $req){
    	if(session()->has("login")){
    		$tipo = new Tipo();
    		$tipo->nome = $req->input('nome');
    		$tipo->descricao = $req->input('descricao');

    		if($tipo->save()){
    			$msg = "Tipo salvo com sucesso";
    		}else{
    			$msg = "Tipo não foi salvo com sucesso";
    		}

    		return view('resultado', ["mensagem" => $msg]);
    	}else{
    		return redirect()->route('tela_login');
    	}
    }
}
