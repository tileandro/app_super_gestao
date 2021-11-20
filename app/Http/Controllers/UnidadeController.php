<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.unidades.create', ['titulo' => 'Cadastrar Unidade de Medida', 'unidades' => $unidades]);
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
        return back()->with('success', 'Unidade ' . $request->input('unidade') . ' foi cadastrada sucesso!');
    }
}
