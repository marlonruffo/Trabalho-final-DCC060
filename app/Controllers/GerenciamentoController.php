<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class GerenciamentoController
{

    public function index()
    {
        $projetos = App::get('database')-> selectAll('projeto');
        return view('gerenciamento/index', compact('projetos'));
    }
}

?>