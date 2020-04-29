@extends('template') @section('conteudo')
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <h1 class="text-center">Login</h1>
        <form class="text-center" method="post" action="{{ route('login') }}">
            @csrf
            <input class="form-control form-control-lg mt-4" type="text" name="login" placeholder="Login">
            <br>
            <input class="form-control form-control-lg" type="password" name="senha" placeholder="Senha">
            <br>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Acessar</button>
        </form>
    </div>
    <div class="col-3"></div>
</div>
@endsection