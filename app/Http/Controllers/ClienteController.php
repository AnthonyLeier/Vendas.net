<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Cliente;

class ClienteController extends Controller
{
    function telaCadastro(){
        return view("tela_cadastro_cliente");
    }

    function telaAlteracao($id){
        $cliente = Cliente::find($id);
        return view("tela_alterar_cliente", [ "c" => $cliente ]);
    }

    function passo1(Request $req){ 
        $nome = $req->input('nome');
        $login = $req->input('login');
        $senha = $req->input('senha');   
        $cep = $req->input('cep'); 
        
        $req->validate([
            'nome' => 'required|min:10',
            'login' => 'required|alpha_num|min:8',
            'senha' => 'required|min:6|different:nome|confirmed',
            'cep' => 'required'
        ]);


        $info = Http::get("viacep.com.br/ws/$cep/json/");

        $logradouro = $info["logradouro"];
        $bairro = $info["bairro"];
        $cidade = $info["localidade"];
        $estado = $info["uf"];

        return view('passo2', [
            'nome' => $nome,
            'login' => $login,
            'senha' => $senha,
            'cep' => $cep,
            'logradouro' => $logradouro,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'estado' => $estado
            ]);
    }

    function adicionar(Request $req){
        $nome = $req->input('nome');
        $login = $req->input('login');
        $senha = $req->input('senha');

        $req->validate([
            'nome' => 'required|min:10',
            'login' => 'required|alpha_num|min:8',
            'senha' => 'required|min:6|different:nome|confirmed'
        ]);

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
    }

    function alterar(Request $req, $id){
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
    }

    function excluir($id){
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
    }

    function listar(Request $req){
        $clientes = null;

        $quantidade = 1;

        if($req->query('ordem')){
            $ordem = $req->query('ordem');

            $clientes = Cliente::where('nome','LIKE', "%$ordem%"); 
            $clientes = Cliente::orderBy($ordem); 
            //$clientes = Cliente::orderBy($ordem, 'desc')->get();
        }

        if($req->query('busca')){
            $busca = $req->query('busca');

            if($clientes == null){
                $clientes = Cliente::where('nome','LIKE', "%$busca%");   
            }else{
                $clientes = $clientes->where('nome','LIKE', "%$busca%"); 
            }
            
        }

        if($clientes == null){
            $clientes = Cliente::paginate($quantidade);
        }else{ 

            $vetor_parametros = [];


            if(isset($ordem)) $vetor_parametros["ordem"] = $ordem;
            if(isset($busca)) $vetor_parametros["busca"] = $busca;


            $clientes = $clientes->paginate($quantidade)->appends($vetor_parametros);
        }

        return view("lista_clientes", [ "listaClientes" => $clientes ]);    
    }
}