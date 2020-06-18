<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::select(["id", "nome", "descricao", "preco"])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = json_decode($request->getContent(), 1);

        $p = new Produto();
        $p->nome = $dados['nome']; 
        $p->descricao = $dados['descricao']; 
        $p->preco = $dados['preco']; 
        $p->unidade_venda = '';
        $p->imagem = '';
        $p->id_tipo = 1;

        $p->save();

        return $p; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Produto::select(["id", "nome", "descricao", "preco"])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $dados = json_decode($request->getContent(), 1);

        $p = Produto::findOrFail($id);
        $p->nome = $dados['nome']; 
        $p->descricao = $dados['descricao']; 
        $p->preco = $dados['preco']; 
        $p->unidade_venda = '';
        $p->imagem = '';
        $p->id_tipo = 1;

        $p->save();

        return $p; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Produto::findOrFail($id);
        $p->delete();

        return $p; 
    }
}
