<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@auntenticar')->name('site.login');
Route::middleware('autenticacao')->prefix('/app')->group(
    function () {
        Route::get('/home', 'HomeController@index')->name('app.home');
        Route::get('/clientes', 'ClientesController@index')->name('app.clientes');
        Route::get('/produtos', 'ProdutosController@index')->name('app.produtos');
        Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
        Route::get('/fornecedores/editar/{id}', 'FornecedorController@editar')->name('app.editarFornecedores');
        Route::post('/fornecedores/editar/{id}', 'FornecedorController@editar')->name('app.editarFornecedores');
        Route::get('/fornecedores/criar', 'FornecedorController@create')->name('app.criarFornecedor');
        Route::post('/fornecedores/criar', 'FornecedorController@create2')->name('app.criarFornecedor');
        Route::post('/fornecedores/editar/{id}', 'FornecedorController@editarFornecedores')->name('app.atualizarFornecedores');
        Route::post('/fornecedores', 'FornecedorController@destroy')->name('app.deletarFornecedores');
        Route::get('/sair', 'LoginController@sair')->name('app.sair');
    }
);
Route::fallback(function () {
    return 'Página não encontrada, <a href="/">Clique aqui</a> para volta para Página inicial.';
});
Route::get(
    '/teste/{nome}/{id}',
    'TesteController@teste'
)->where('nome', '[A-Za-z]+')->where('id', '[0-9]+')->name('site.teste');
