@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Cadastro de Produto</h1>
<form method="post" action="{{route('produto_add')}}" class="mt-4">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome">
    </div>
    <div class="form-group">
        <textarea class="form-control" id="textarea" name="descricao" rows="3" placeholder="Descrição"></textarea>
    </div>
    <div class="form-group">
        <input type="number" name="preco" class="form-control" placeholder="Preço" min="0" step="0.1">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="unidade" placeholder="Unidade de Medida">
    </div>
    <div class="form-group">
        <label for="tipoSelect">Tipo:</label>
        <select class="form-control" id="tipoSelect" name="id_tipo">
            @foreach($listaTipos as $t)
            <option value="{{$t->id}}">{{$t->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mt-3">
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
    </div>
</form>
@endsection