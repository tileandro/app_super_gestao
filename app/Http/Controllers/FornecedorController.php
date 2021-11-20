<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\LogAcessoMiddleware;
use App\LogAcesso;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $usuario = '';
        if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
            $usuario = $_SESSION['nome'];
        }

        $fornecedores = Fornecedor::all();
        return view('app.fornecedores', ['titulo' => 'Fornecedores', 'fornecedores' => $fornecedores, 'usuario' => $usuario]);
    }

    public function editar($id)
    {
        $fornecedor = Fornecedor::where('id', $id)->get();
        $usuario = $fornecedor[0]->nome;
        return view('app.fornecedores.editar', ['titulo' => 'Editar Fornecedor', 'fornecedor' => $fornecedor, 'usuario' => $usuario]);
    }

    public function atualizarFornecedores(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|max:50',
                'uf' => 'required|max:2|min:2',
                'email' => 'email|max:100'
            ],
            [
                'required' => 'Campo :attribute é obrigatório seu preenchimento',
                'email.email' => 'Campo e-mail é obrigatório seu preenchimento',
                'nome.max' => 'Campo nome é permitido até 50 caracteres',
                'uf.min' => 'Campo estado é permitido no mínimo 2 caracteres',
                'uf.max' => 'Campo estado é permitido até 2 caracteres',
                'email.max' => 'Campo e-mail é permitido até 100 caracteres',
                'email.unique' => 'E-mail já cadastrado, por favor digite outro e-mail.'
            ]
        );

        Fornecedor::whereIn('id', [$request->input('id')])->update(
            [
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
                'uf' => $request->input('uf')
            ]
        );

        return redirect()->route('app.editarFornecedores', $request->input('id'))->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function create()
    {
        $usuario = '';
        if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
            $usuario = $_SESSION['nome'];
        }
        return view('app.fornecedores.criar', ['titulo' => 'Criar Fornecedor', 'usuario' => $usuario]);
    }

    public function create2(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|max:50',
                'uf' => 'required|max:2',
                'email' => 'email|max:100|unique:fornecedor'
            ],
            [
                'nome.required' => 'Campo nome é obrigatório seu preenchimento',
                'email.email' => 'Campo e-mail é obrigatório seu preenchimento',
                'uf.required' => 'Campo estado é obrigatório seu preenchimento',
                'nome.max' => 'Campo nome é permitido até 50 caracteres',
                'uf.max' => 'Campo estado é permitido até 2 caracteres',
                'email.max' => 'Campo e-mail é permitido até 100 caracteres',
                'email.unique' => 'E-mail já cadastrado, por favor digite outro e-mail.'
            ]
        );
        Fornecedor::create(['nome' => $request->input('nome'), 'email' => $request->input('email'), 'uf' => $request->input('uf')]);
        return back()->with('success', 'Fornecedor ' . $request->input('nome') . ' cadastrado sucesso!');
    }

    public function destroy(Request $request)
    {
        Fornecedor::destroy($request->input('idusuario'));
        return back()->with('success', 'Fornecedor deletado sucesso!');
    }
}
