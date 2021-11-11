<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha não existem!';
        }
        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login.';
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function auntenticar(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Campo e-mail é obrigatório seu preenchimento',
                'email.email' => 'Digite um e-mail válido',
                'password.required' => 'Campo senha é obrigatório seu preenchimento'
            ]
        );
        $usuario = User::where('email', $request->input('email'))
            ->where('password', base64_encode($request->input('password')))
            ->get()
            ->first();
        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
