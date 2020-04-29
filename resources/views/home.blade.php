@extends('template') @section('conteudo')
<div class="col-12 text-center mt-2">
    <h1>Bem-vindo ao Vendas.net</h1>
    <h4>Olá, {{session('nome')}}</h4>
</div>
@endsection