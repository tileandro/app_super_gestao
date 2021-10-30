<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste($nome = 'Desconhecido', $id = 0)
    {
        return 'Resposta: ' . $nome . ' - ' . $id;
    }
}
