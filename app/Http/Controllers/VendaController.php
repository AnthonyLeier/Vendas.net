<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Venda;
use App\Produto;
class VendaController extends Controller
{
    function telaVenda(){
        if(session()->has("login")){
        	$clientes = Cliente::all();
        	return view("tela_cadastro_venda", ["lista" => $clientes]);
        }else{
            return redirect()->route('tela_login');
        }

    }

    function adicionar(Request $req){
        if(session()->has("login")){
        	#$valor = $req->input('valor');
        	$id_cliente = $req->input('id_cliente');

        	$v = new Venda();

        	$v->valor = 0;
        	$v->id_cliente = $id_cliente;

        	if ($v->save()){
        		$msg = "Venda adicionada com sucesso.";
        	} else {
        		$msg = "Venda não foi cadastrada.";
        	}
            return redirect()->route('tela_venda_item_cadastro', ['id' => $v->id]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function vendasPorCliente($id){
        if(session()->has("login")){
            //$id = id do cliente
            $cliente = Cliente::find($id);
            return view('lista_vendas_clientes', ["cliente" => $cliente]); 
        }else{
            return redirect()->route('tela_login');
        }
    }

    function listar(){
        if(session()->has("login")){
            $vendas = Venda::all();
            return view('lista_vendas_geral', ["vendas" => $vendas]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function itensVenda($id){
        if(session()->has("login")){
            $venda = Venda::find($id);
            return view('lista_itens_venda', ['venda' => $venda]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function telaAddItem($id){
        if(session()->has("login")){
            $venda = Venda::find($id);
            $produtos = Produto::all();
            return view('tela_cadastro_itens_venda', ['venda' => $venda, 'listaProdutos' => $produtos]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function addItem(Request $req, $id){
        if(session()->has("login")){
            $id_produto = $req->input('id_produto');
            $qtde = $req->input('quantidade');

            $p = Produto::find($id_produto);
            $v = Venda::find($id);

            $subtotal = $p->preco * $qtde;

            $colunas_pivot = ['quantidade' => $qtde, 'subtotal' => $subtotal];

            $v->produtos()->attach($id_produto, $colunas_pivot);
            $v->valor += $subtotal;
            $v->save();
            return redirect()->route('tela_venda_item_cadastro', ['id' => $v->id]);

        }else{
            return redirect()->route('tela_login');
        }
    }

    function delItem($id, $id_pivot){    
        if(session()->has("login")){
            $venda = Venda::find($id);
            $subtotal = 0;

            foreach($venda->produtos as $vp){
                if($vp->pivot->id == $id_pivot){
                    $subtotal = $vp->pivot->subtotal;
                    break;
                }
            }

            $venda->valor -= $subtotal;
            $venda->produtos()->wherePivot('id', '=', $id_pivot)->detach();
            $venda->save();
            
            return redirect()->route('tela_venda_item_cadastro', ['id' => $venda->id]);

        }else{
            return redirect()->route('tela_login');
        }
    }
}
