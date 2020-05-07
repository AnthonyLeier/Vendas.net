@extends('template') @section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1 class="col-12 text-center mt-2">Cadastro de Cliente</h1>
<form method="post" action="{{route('cliente_add')}}" class="mt-4">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{old('nome')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="login" placeholder="Login" value="{{old('login')}}">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="senha" placeholder="Senha">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="senha_confirmation" placeholder="Repita a Senha">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
    </div>
</form>
@endsection