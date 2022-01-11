<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedidos)
    {
        $produtos = Produto::all();
        return view('app.pedido-produtos.create', ['titulo' => "Add Produto no Pedido $pedidos->id", 'pedidos' => $pedidos, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedidos)
    {
        $request->validate(
            [
                'produto_id' => 'required',
                'quantidade' => 'required'
            ],
            [
                'required' => 'O campo :attribute é obrigatório'
            ]
        );

        $pedidos->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return back()->with('success', 'Produto cadastrado no Pedido com sucesso!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedidos, Produto $produtos)
    {
        $pedidos->produtos()->detach($produtos->id);
        return back()->with('success', 'Produto ' . $produtos->nome . ' deletado do Pedido com sucesso!');
    }
}
