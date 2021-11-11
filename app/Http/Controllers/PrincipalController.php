<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal()
    {
        session_start();
        $usuario = '';
        if (isset($_SESSION['nome'])) {
            $usuario = $_SESSION['nome'];
        }
        return view('site.principal', ['titulo' => 'Home', 'usuario' => $usuario]);
    }
}
