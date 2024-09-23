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
        session_start();
        $user = $_SESSION['user'];

        $parameters = [
            "idAluno" => $user["idUsuario"],
            "idDisciplina" => $_POST["disciplinas"]
        ];
        

        App::get('database')->insert('aluno_cursou_disciplina', $parameters);

        header('location: disciplinas');
    }

    public function deletar()
    {
        session_start();
        $user = $_SESSION['user'];



        App::get('database')->delete('aluno_cursou_disciplina', $user["idUsuario"], $_POST["idDisciplina"]);    
        
    

        header('location: disciplinas');
    }

}

?>