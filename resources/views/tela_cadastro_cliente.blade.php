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
        <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{old('nome')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="login" placeholder="Login" value="{{old('login')}}">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="senha" placeholder="Senha" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="senha_confirmation" placeholder="Repita a Senha">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" onblur="carregaInfo()" name="cep" placeholder="CEP" id="cep">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" id="logradouro" name="logradouro" placeholder="Logradouro">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" id="bairro" name="bairro" placeholder="Bairro">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" id="cidade" name="cidade" placeholder="Cidade">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" id="estado" name="estado" placeholder="Estado">
    </div>

    <div id="resposta"></div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
    </div>
</form>

<script type="text/javascript">
    function carregaInfo(){
        var cep, http;

        cep = document.getElementById("cep").value;
        if(cep != ""){
            http = new XMLHttpRequest();  

            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    var dados = JSON.parse(this.responseText);
                    console.log(dados);

                    document.getElementById("logradouro").value = dados.logradouro;
                    document.getElementById("bairro").value = dados.bairro;
                    document.getElementById("cidade").value = dados.localidade;
                    document.getElementById("estado").value = dados.uf;                    
                    document.getElementById("resposta").innerHTML = "";

                } else if (this.readyState != 4){
                    var loading = document.createElement("div");
                    loading.className = "spinner-border";

                    document.getElementById("resposta").appendChild(loading);
                }
            };

            http.open("GET", "http://viacep.com.br/ws/" + cep + "/json/");
            http.send();  
        }        
    }
</script>
@endsection