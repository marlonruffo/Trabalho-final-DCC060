<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class GerenciamentoController
{

    public function index()
    {
        // $projetos = App::get('database')->selectAll('projeto');
        $projetos = App::get('database')->selectAllProjectsAndTypes();
        $professores = App::get('database')-> selectAll('usuario');
        return view('gerenciamento/index', compact('projetos', 'professores'));
    }

    public function store()
    {
        try {
            App::get('database')->insertProjeto('projeto', [
                'titulo' => $_POST['titulo'],
                'descricao' => $_POST['descricao'],
                'dataInicio' => $_POST['dataInicio'],
                'dataFim' => $_POST['dataFim'],
                'status' => $_POST['status'],
                'qtdeVagas' => $_POST['qtdeVagas'],
                'idProfessor' => $_POST['idProfessor'],
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }

        return redirect('gerenciamento');
    }

    public function delete()
    {
        try {
            App::get('database')->deleteProjeto('projeto', $_POST['idProjeto']);
        } catch (Exception $e) {
            die($e->getMessage());
        }

        return redirect('gerenciamento');
    }
    public function update()
    {
        try {
            App::get('database')->updateProjeto('projeto', [
                'titulo' => $_POST['titulo'],
                'descricao' => $_POST['descricao'],
                'dataInicio' => $_POST['dataInicio'],
                'dataFim' => $_POST['dataFim'],
                'status' => $_POST['status'],
                'qtdeVagas' => $_POST['qtdeVagas'],
            ], $_POST['idProjeto']);
        } catch (Exception $e) {
            die($e->getMessage());
        }

        return redirect('gerenciamento');
    }
}

?>