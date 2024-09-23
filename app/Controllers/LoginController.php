<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{

    public function index()
    {
        return view('login/index');
    }

    public function confirmLogin()
    {
        
        $cpf = $_POST["login"];
        $password = $_POST["password"];

        $logged = App::get('database')->login('Usuario', $cpf, $password);

        if($logged != false){
            session_start();
            $_SESSION['user'] = $logged;
            header('Location: /disciplinas');
        } else { 
            $erro = [
                'erro' => "Usuário ou senha inválidos",
            ] ;
            return view('login/index', $erro);
        }

    }

public function logout(){
    session_start();
    session_destroy();
    header('Location: /');
}

}