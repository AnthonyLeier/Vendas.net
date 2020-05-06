@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Cadastro de Cliente</h1>
<form method="post" action="{{route('cliente_add')}}" class="mt-4">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="login" placeholder="Login" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="senha" placeholder="Senha" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
    </div>
</form>
@endsection