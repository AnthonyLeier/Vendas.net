<!DOCTYPE html>
<html>

<head>
    <title>Vendas.net</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar-expand-lg navbar navbar-dark bg-primary w-100">
                <a class="navbar-brand" href="{{route('home')}}">Vendas.net</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-light">Olá, {{session('nome')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tela_cliente_cadastro')}}">Cadastrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cliente_listar')}}">Listar Usuários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tela_venda_cadastro')}}">Vender</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('venda_listar')}}">Listar Vendas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tela_tipo_cadastro')}}">Novo Tipo de Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tela_produto_cadastro')}}">Novo Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tela_produto_listar')}}">Listar Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Sair</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-2">
                <!-- coluna vazia esquerda -->
            </div>
            <div class="col-md-8 mt-3">
                @yield('conteudo')
            </div>
            <div class="col-md-2">
                <!-- coluna vazia direita -->
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>