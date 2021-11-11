<?php

namespace App\Http\Controllers;

use App\SiteContato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ContatoController extends Controller
{
    public function contato()
    {
        $usuario = '';
        if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
            $usuario = $_SESSION['nome'];
        }
        return view('site.contato', ['titulo' => 'Contato', 'usuario' => $usuario]);
    }

    public function salvar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|max:50',
                'telefone' => 'required|max:20',
                'email' => 'email|max:100',
                'assunto' => 'required',
                'mensagem' => 'required'
            ],
            [
                'nome.required' => 'Campo nome é obrigatório seu preenchimento',
                'telefone.required' => 'Campo telefone é obrigatório seu preenchimento',
                'email.email' => 'Campo e-mail é obrigatório seu preenchimento',
                'assunto.required' => 'Escolha uma opção no assunto',
                'mensagem.required' => 'Campo mensagem é obrigatório seu preenchimento',
                'nome.max' => 'Campo nome é permitido até 50 caracteres',
                'telefone.max' => 'Campo telefone é permitido até 20 caracteres',
                'email.max' => 'Campo e-mail é permitido até 100 caracteres',
                'email.unique' => 'E-mail já cadastrado, por favor digite outro e-mail.'
            ]
        );
        SiteContato::create($request->all());
        //return redirect()->route('site.index');
        return back()->with('success', 'Dados enviado com sucesso!');
    }
}
