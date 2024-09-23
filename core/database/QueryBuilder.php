<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function select_disciplinas_feitas($cpf)
    {
        $sql  = "SELECT 
                    d.nome AS NomeDisciplina,
                    d.codigo AS CodigoDisciplina,
                    d.cargaHoraria AS CargaHoraria
                FROM 
                    bolsafacil.Aluno_Cursou_Disciplina acd
                JOIN 
                    bolsafacil.Disciplina d ON acd.idDisciplina = d.idDisciplina
                JOIN 
                    bolsafacil.Aluno a ON acd.idAluno = a.idAluno
                JOIN 
                    bolsafacil.Usuario u ON a.idAluno = u.idUsuario
                LEFT JOIN 
                    bolsafacil.PreRequisito_Associado_Disciplina prd ON d.idDisciplina = prd.idDisciplina
                LEFT JOIN 
                    bolsafacil.PreRequisito pr ON prd.idPreRequisito = pr.idPreRequisito
                WHERE 
                    u.cpf = {$cpf}";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    function login($table, $cpf, $password)
    {
        $sql = sprintf('SELECT * FROM %s WHERE cpf = :cpf', $table);
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && $password == $user['senha']) {
            return $user;
        } else {
            return false;
        }
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', array_keys($parameters)), ':' .implode(', :', array_keys($parameters)));

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}