<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Venda;
use App\Produto;
class VendaController extends Controller
{
    function telaVenda(){
        $clientes = Cliente::all();
        return view("tela_cadastro_venda", ["lista" => $clientes]);
    }

    function adicionar(Request $req){
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
    }

    function vendasPorCliente($id){
        //$id = id do cliente
        $cliente = Cliente::find($id);
        return view('lista_vendas_clientes', ["cliente" => $cliente]);
    }

    function listar(){
        $vendas = Venda::all();
        return view('lista_vendas_geral', ["vendas" => $vendas]);
    }

    function itensVenda($id){
        $venda = Venda::find($id);
        return view('lista_itens_venda', ['venda' => $venda]);
    }

    function telaAddItem($id){
        $venda = Venda::find($id);
        $produtos = Produto::all();
        return view('tela_cadastro_itens_venda', ['venda' => $venda, 'listaProdutos' => $produtos]);
    }

    function addItem(Request $req, $id){
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
    }

    function delItem($id, $id_pivot){    
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
    }
}
