<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class DisciplinasController
{

    public function index()
    {
        session_start();
        $user = $_SESSION['user'];
        $disciplinas = App::get('database')-> selectAll('disciplina');
        $preRequisitos = App::get('database')-> select_disciplinas_feitas($user['cpf']);
        return view('disciplinas/index', compact("disciplinas", "preRequisitos"));
    }

    public function novaMateria()
    {
        $parameters = [
            'nome' => $_POST['nome'],
            'codigo' => $_POST['codigo'],
            'cargaHoraria' => $_POST['carHoraria'],
        ];

        App::get('database')->insert('disciplina', $parameters);

        header('location: disciplinas/index');
    }

}

?>