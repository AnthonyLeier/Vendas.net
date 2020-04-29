@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Cadastro de Itens para Venda #{{$venda->id}}</h1>
<form method="post" action="{{route('venda_item_cadastro', ['id' => $venda->id])}}" class="mt-4">
    @csrf
    <div class="form-group">
        <select name="id_produto" class="form-control">
            @foreach($listaProdutos as $p)
            <option value="{{ $p-> id}}">{{$p->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <input type="number" name="quantidade" class="form-control" min="1" step="0.01">
    </div>
    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Vender">
</form>
<h5 class="mt-3">Itens Adicionados</h5>
<table class="table table-striped">
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
            <td><a href="#" class="btn btn-danger" onclick="exclui({{$p->pivot->id}})">Remover</a></td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Total:</td>
            <td><b>{{$venda->valor}}</b></td>
            <td></td>
        </tr>
    </tbody>
</table>
<a href="{{route('home')}}">
    <button class="btn btn-primary btn-lg btn-block">Sair</button>
</a>
<script>
    function exclui(id) {
        if (confirm("Deseja excluir o produto de id: " + id + "?")) {
            location.href = "remover/" + id;
        }
    }
</script>
@endsection