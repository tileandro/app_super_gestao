<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $usuario = '';
        if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
            $usuario = $_SESSION['nome'];
        }
        return view('app.home', ['titulo' => 'Home', 'usuario' => $usuario]);
    }
}
