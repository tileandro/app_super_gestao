<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtoDetalhes = ProdutoDetalhe::all();
        return view('app.produto_detalhe.index', ['titulo' => 'Detalhes dos Produtos', 'produtoDetalhes' => $produtoDetalhes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $produtos = Produto::all();
        return view('app.produto_detalhe.create', ['titulo' => 'Adicionar Detalhes do Produto', 'unidades' => $unidades, 'produtos' => $produtos]);
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
                'produto_id' => 'required',
                'unidade_id' => 'required',
                'comprimento' => 'required',
                'largura' => 'required',
                'altura' => 'required'
            ],
            [
                'required' => 'Campo :attribute é obrigatório seu preenchimento'
            ]
        );
        ProdutoDetalhe::create($request->all());
        return back()->with('success', 'Detalhe do Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        $unidades = Unidade::all();
        $produtos = Produto::all();
        return view('app.produto_detalhe.edit', ['titulo' => 'Editar Detalhe do Produto', 'produto_detalhe' => $produto_detalhe, 'unidades' => $unidades, 'produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $request->validate(
            [
                'produto_id' => 'required',
                'unidade_id' => 'required',
                'comprimento' => 'required',
                'largura' => 'required',
                'altura' => 'required'
            ],
            [
                'required' => 'Campo :attribute é obrigatório seu preenchimento'
            ]
        );
        $produto_detalhe->update($request->all());
        return back()->with('success', 'Detalhe do Produto cadastrado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produto_detalhe)
    {
        $produto_detalhe->delete();
        return back()->with('success', 'Produto deletado sucesso!');
    }
}
