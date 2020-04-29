@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Vendas do Cliente {{$cliente->nome}}</h1> @if(count($cliente->vendas) > 0)
<table class="table table-striped table-bordered mt-3">
    <thead>
        <tr>
            <th>ID Venda</th>
            <th class="text-right">Valor da Venda</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cliente->vendas as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td class="text-right">{{$v->valor}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="alert alert-danger">Não existem vendas para esse cliente.</div>
@endif @endsection