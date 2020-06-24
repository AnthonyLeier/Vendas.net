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
<form method="post" action="{{route('cliente_passo1')}}" class="mt-4">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{$nome}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="login" placeholder="Login" value="{{$cep}}">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="senha" placeholder="Senha" required value="{{$senha}}">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="senha_confirmation" placeholder="Repita a Senha" value="{{$senha}}">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" value="{{$cep}}" name="cep" placeholder="CEP">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
    </div>
</form>
@endsection