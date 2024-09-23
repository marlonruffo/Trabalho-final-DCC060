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
            $projeto = App::get('database')->insertProjeto('projeto', [
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

        if ($_POST['tipo'] == 'iniciacaocientifica') {
            try {
                App::get('database')->insertProjeto('iniciacaocientifica', [
                    'idProjeto' => $projeto,
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else if ($_POST['tipo'] == 'monitoria') {
            try {
                App::get('database')->insertProjeto('monitoria', [
                    'idProjeto' => $projeto,
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else if ($_POST['tipo'] == 'extensao') {
            try {
                App::get('database')->insertProjeto('extensao', [
                    'idProjeto' => $projeto,
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else if ($_POST['tipo'] == 'treinamentoprofissional') {
            try {
                App::get('database')->insertProjeto('treinamentoprofissional', [
                    'idProjeto' => $projeto,
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
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
        $tipop = $_POST['tipo_projeto'];
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

        if($_POST['tipo'] == $_POST['tipo_projeto']){
            return redirect('gerenciamento');
        }

        if ($_POST['tipo'] == 'iniciacaocientifica') {
            try {
                App::get('database')->insertProjeto('iniciacaocientifica', [
                    'idProjeto' => $_POST['idProjeto'],
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
            try {
                App::get('database')->deleteProjeto($tipop, $_POST['idProjeto']);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else if ($_POST['tipo'] == 'monitoria') {
            try {
                App::get('database')->insertProjeto('monitoria', [
                    'idProjeto' => $_POST['idProjeto'],
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
            try {
                App::get('database')->deleteProjeto($tipop, $_POST['idProjeto']);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else if ($_POST['tipo'] == 'extensao') {
            try {
                App::get('database')->insertProjeto('extensao', [
                    'idProjeto' => $_POST['idProjeto'],
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
            try {
                App::get('database')->deleteProjeto($tipop, $_POST['idProjeto']);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else if ($_POST['tipo'] == 'treinamentoprofissional') {
            try {
                App::get('database')->insertProjeto('treinamentoprofissional', [
                    'idProjeto' => $_POST['idProjeto'],
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
            try {
                App::get('database')->deleteProjeto($tipop, $_POST['idProjeto']);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        return redirect('gerenciamento');
    }
}

?>