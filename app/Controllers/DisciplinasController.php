<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class DisciplinasController
{

    public function index()
    {
        $disciplinas = App::get('database')-> selectAll('disciplina');
        return view('disciplinas/index', $disciplinas);
    }
}

?>