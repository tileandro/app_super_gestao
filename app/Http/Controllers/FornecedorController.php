<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('app.fornecedores.index', ['titulo' => 'Fornecedores', 'fornecedores' => $fornecedores]);
    }

    public function editar($id)
    {
        $fornecedor = Fornecedor::where('id', $id)->get();
        return view('app.fornecedores.editar', ['titulo' => 'Editar Fornecedor', 'fornecedor' => $fornecedor]);
    }

    public function editarFornecedores(Request $request, $id)
    {
        echo $request->input('nome');
        $request->validate(
            [
                'nome' => 'required|max:50',
                'uf' => 'required|max:2',
                'email' => 'email|max:100|unique:site_contatos'
            ],
            [
                'nome.required' => 'Campo nome é obrigatório seu preenchimento',
                'email.email' => 'Campo e-mail é obrigatório seu preenchimento',
                'uf.required' => 'Campo UF é obrigatório seu preenchimento',
                'nome.max' => 'Campo nome é permitido até 50 caracteres',
                'uf.max' => 'Campo telefone é permitido até 2 caracteres',
                'email.max' => 'Campo e-mail é permitido até 100 caracteres',
                'email.unique' => 'E-mail já cadastrado, por favor digite outro e-mail.'
            ]
        );
        Fornecedor::whereIn('id', [$id])->update(
            [
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
                'uf' => $request->input('uf')
            ]
        );
        return back()->with('success', 'Dados enviado com sucesso!');
    }
}
