<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $usuario = '';
        if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
            $usuario = $_SESSION['nome'];
        }
        return view('app.clientes', ['titulo' => 'Clientes', 'usuario' => $usuario]);
    }
}
