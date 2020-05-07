@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Lista de Produtos</h1>
<table class="table table-striped table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Unidade de Medida</th>
            <th>Tipo</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lista as $p)
        <tr>
            <td><img src="{{url($p->imagem)}}"></td>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>{{ $p->descricao }}</td>
            <td>{{ $p->preco }}</td>
            <td>{{ $p->unidade_venda }}</td>
            <td>{{ $p->tipo->nome }}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('tela_produto_alteracao', [ 'id' => $p->id ]) }}">Alterar</a>
                <a class="btn btn-danger btn-sm" href="#" onclick="exclui({{$p->id}})">Excluir</a>
            </td>
            @endforeach
    </tbody>
</table>
<a class="btn btn-primary btn-block" href="{{ route('tela_produto_cadastro') }}">Cadastrar novo</a>
<script>
    function exclui(id) {
        if (confirm("Deseja excluir o produto de id: " + id + "?")) {
            location.href = "/produto/excluir/" + id;
        }
    }
</script>
@endsection