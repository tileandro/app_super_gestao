<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function sobreNos()
    {
        $usuario = '';
        session_start();
        if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
            $usuario = $_SESSION['nome'];
        }
        return view('site.sobre-nos', ['titulo' => 'Sobre Nós', 'usuario' => $usuario]);
    }
}
