@extends('template') @section('conteudo')
<h1 class="col-12 text-center mt-2">Cadastro de Venda</h1>
<form method="post" action="{{ route('venda_add') }}" class="mt-4">
    @csrf
    <div class="form-group">
        <select name="id_cliente" class="form-control">
            @foreach($lista as $c)
            <option value="{{$c-> id}}">{{$c->nome}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Selecionar Cliente">
</form>
@endsection