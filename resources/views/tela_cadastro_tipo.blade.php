@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Cadastro de Tipos de Produtos</h1>
<form method="post" action="{{route('tipo_add')}}" class="mt-4">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
    </div>
    <div class="form-group">
        <textarea class="form-control" id="textarea" name="descricao" rows="3" placeholder="Descrição" required></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
    </div>
</form>
@endsection