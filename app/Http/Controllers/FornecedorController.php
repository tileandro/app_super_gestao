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
        $fornecedores = Fornecedor::where('id', $id)->get();
        return view('app.fornecedores.editar.index', ['titulo' => 'Editar Fornecedor', 'fornecedores' => $fornecedores]);
    }

    public function editarFornecedores(Request $request)
    {
        $fornecedores = Fornecedor::all();
        return view('app.fornecedores.editar.index', ['titulo' => 'Editar Fornecedor']);
    }
}
