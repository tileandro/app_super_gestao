<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Produto;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = '';
        if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
            $usuario = $_SESSION['nome'];
        }

        $produtos = Produto::all();
        return view('app.produtos.index', ['titulo' => 'Produtos', 'produtos' => $produtos, 'usuario' => $usuario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produtos.create', ['titulo' => 'Cadastrar Produto', 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required',
                'descricao' => 'required',
                'peso' => 'required|max:3|min:1',
                'fornecedor_id' => 'required',
                'unidade_id' => 'required'
            ],
            [
                'required' => 'Campo :attribute é obrigatório seu preenchimento',
                'peso.max' => 'Campo :attribute permitido no máximo 3 dígitos',
                'peso.min' => 'Campo :attribute permitido no mínimo 1 dígitos'
            ]
        );
        Produto::create($request->all());
        return back()->with('success', 'Produto ' . $request->input('nome') . ' cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produtos.edit', ['titulo' => "Editar produto", 'produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate(
            [
                'nome' => 'required',
                'descricao' => 'required',
                'peso' => 'required|max:3|min:1',
                'unidade_id' => 'required',
                'fornecedor_id' => 'required'
            ],
            [
                'required' => 'Campo :attribute é obrigatório seu preenchimento',
                'peso.max' => 'Campo :attribute permitido no máximo 3 dígitos',
                'peso.min' => 'Campo :attribute permitido no mínimo 1 dígitos'
            ]
        );
        $produto->update($request->all());
        return back()->with('success', 'Produto ' . $request->input('nome') . ' editaaaado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return back()->with('success', 'Produto deletado sucesso!');
    }
}
