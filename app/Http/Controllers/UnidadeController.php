<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
        return view('app.unidades.index', ['titulo' => 'Unidades de Medida', 'unidades' => $unidades]);
    }

    public function create()
    {
        //$unidades = Unidade::all();
        return view('app.unidades.create', ['titulo' => 'Cadastrar Unidade de Medida']);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'unidade' => 'required|max:5',
                'descricao' => 'required'
            ],
            [
                'required' => 'Campo :attribute é obrigatório seu preenchimento',
                'unidade.max' => 'Campo :attribute permitido no máximo 5 dígitos'
            ]
        );
        Unidade::create($request->all());
        return back()->with('success', 'Unidade ' . $request->input('unidade') . ' cadastrado com sucesso!');
    }

    public function show(Unidade $unidade)
    {
        return view('app.unidades.show', ['titulo' => 'Ver Unidade', 'unidade' => $unidade]);
    }

    public function edit(Unidade $unidade)
    {

        return view('app.unidades.edit', ['titulo' => 'Editar Unidade', 'unidade' => $unidade]);
    }

    public function update(Request $request, Unidade $unidade)
    {
        $request->validate(
            [
                'unidade' => 'required|max:5',
                'descricao' => 'required'
            ],
            [
                'required' => 'Campo :attribute é obrigatório seu preenchimento',
                'unidade.max' => 'Campo :attribute permitido no máximo 5 dígitos'
            ]
        );
        $unidade->update($request->all());
        return back()->with('success', 'Unidade ' . $request->input('unidade') . ' editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        $unidade->delete();
        return back()->with('success', 'Produto deletado sucesso!');
    }
}
