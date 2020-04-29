@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Alteração de Usuário</h1>
<form method="post" action="{{ route('cliente_update', ['id' => $c->id]) }}" class="mt-4">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $c->nome }}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="login" placeholder="Login" value="{{ $c->login }}">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="senha" placeholder="Senha" value="{{ $c->senha }}">
    </div>
    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Alterar">
</form>
@endsection