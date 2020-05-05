<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function(){
	Route::get('/cliente/listar', 'ClienteController@listar')->name('cliente_listar');
	Route::post('/login', 'AppController@login')->name('login');
	Route::get('/logout', 'AppController@logout')->name('logout');
	Route::get('/vendas/cliente/{id}', 'VendaController@vendasPorCliente')->name('venda_cliente_listar');
	Route::get('/vendas/listar', 'VendaController@listar')->name('venda_listar');
	Route::get('/vendas/{id}/itens', 'VendaController@itensVenda')->name('venda_item_listar');
	Route::get('/produto/listar', 'ProdutoController@listar')->name('tela_produto_listar');

	Route::middleware(['eh_admin'])->group(function(){
		Route::get('/cliente/cadastro', 'ClienteController@telaCadastro')->name('tela_cliente_cadastro');
		Route::get('/cliente/alterar/{id}', 'ClienteController@telaAlteracao')->name('tela_cliente_alteracao');
		Route::post('/cliente/adicionar', 'ClienteController@adicionar')->name('cliente_add');
		Route::post('/cliente/alterar/{id}', 'ClienteController@alterar')->name('cliente_update');
		Route::get('/cliente/excluir/{id}', 'ClienteController@excluir')->name('cliente_delete');
		Route::get('/venda/cadastro', 'VendaController@telaVenda')->name('tela_venda_cadastro');
		Route::post('/venda/adicionar', 'VendaController@adicionar')->name('venda_add');
		Route::get('/vendas/{id}/itens/novo', 'VendaController@telaAddItem')->name('tela_venda_item_cadastro');
		Route::post('/vendas/{id}/itens/adicionar', 'VendaController@addItem')->name('venda_item_cadastro');
		Route::get('/vendas/{id}/itens/remover/{id_pivot}', 'VendaController@delItem')->name('venda_item_remover');
		Route::get('/tipo/cadastro', 'ProdutoController@telaNovoTipo')->name('tela_tipo_cadastro');
		Route::post('/tipo/adicionar', 'ProdutoController@novoTipo')->name('tipo_add');
		Route::get('/produto/cadastro', 'ProdutoController@telaCadastro')->name('tela_produto_cadastro');
		Route::post('/produto/adicionar', 'ProdutoController@adicionar')->name('produto_add');
		Route::get('/produto/alterar/{id}', 'ProdutoController@telaAlteracao')->name('tela_produto_alteracao');
		Route::post('/produto/alterar/{id}', 'ProdutoController@alterar')->name('produto_update');
		Route::get('/produto/excluir/{id}', 'ProdutoController@excluir')->name('produto_delete');
	});
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');