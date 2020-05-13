@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Lista de Clientes</h1>
<form class="form-control">
    <input type="text" name="busca" placeholder="Buscar" autocomplete="off">
    <input type="submit">
</form>
<table class="table table-striped table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th><a href="?ordem=nome">Nome</a></th>
            <th>Login</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listaClientes as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nome }}</td>
            <td>{{ $c->login }}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('cliente_update', [ 'id' => $c->id ]) }}">Alterar</a>
                <a class="btn btn-info w-50" href="{{ route('venda_cliente_listar', [ 'id' => $c->id ]) }}">Vendas</a>
                <a class="btn btn-danger" href="#" onclick="exclui({{$c->id}})">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$listaClientes->links()}}


<a class="btn btn-primary btn-block" href="{{ route('tela_cliente_cadastro') }}">Cadastrar novo</a>
<script>
    function exclui(id) {
        if (confirm("Deseja excluir o usuário de id: " + id + "?")) {
            location.href = "/cliente/excluir/" + id;
        }
    }
</script>
@endsection