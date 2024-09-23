<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('disciplinas', 'DisciplinasController@index');
    $router->get('gerenciamento', 'GerenciamentoController@index');

    $router->post('gerenciamento/store', 'GerenciamentoController@store');
    $router->post('gerenciamento/delete', 'GerenciamentoController@delete');
    $router->post('gerenciamento/update', 'GerenciamentoController@update');
    
?>