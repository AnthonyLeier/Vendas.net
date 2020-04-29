@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Vendas</h1>
<table class="table table-striped table-bordered mt-3">
    <thead>
        <tr>
            <th>ID Venda</th>
            <th>Valor da Venda</th>
            <th>Data</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vendas as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->valor}}</td>
            <td>{{$v->created_at}}</td>
            <td><a class="btn btn-info btn-block" href="{{route('venda_item_listar', ['id' => $v->id])}}">Itens</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary btn-block" href="route('tela_venda_cadastro')">Cadastrar Nova</a> @endsection