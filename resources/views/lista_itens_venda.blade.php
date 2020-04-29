@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Venda #{{$venda->id}}</h1>
<table class="table table-striped table-bordered mt-3">
    <thead>
        <tr>
            <th>ID Item</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Valor Unitário</th>
            <th>Subtotal</th>
            <th>Data</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($venda->produtos as $p)
        <tr>
            <td>{{$p->pivot->id}}</td>
            <td>{{$p->nome}}</td>
            <td>{{$p->pivot->quantidade}}</td>
            <td>{{$p->preco}}</td>
            <td>{{$p->pivot->subtotal}}</td>
            <td>{{$p->pivot->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection