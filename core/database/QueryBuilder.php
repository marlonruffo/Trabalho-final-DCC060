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


    public function selectAllProjectsAndTypes()
    {
        $sql = "
        SELECT 
            p.idProjeto,
            p.titulo,
            p.descricao,
            p.dataInicio,
            p.dataFim,
            p.data_cadastro,
            p.status,
            p.qtdeVagas,
            p.idProfessor,
            'Iniciação Científica' AS tipo_projeto
        FROM 
            projeto p
        JOIN 
            iniciacaocientifica ic ON p.idProjeto = ic.idIC
        
        UNION ALL

        SELECT 
            p.idProjeto,
            p.titulo,
            p.descricao,
            p.dataInicio,
            p.dataFim,
            p.data_cadastro,
            p.status,
            p.qtdeVagas,
            p.idProfessor,
            'Treinamento Profissional' AS tipo_projeto
        FROM 
            projeto p
        JOIN 
            treinamentoprofissional tp ON p.idProjeto = tp.idTP
        
        UNION ALL

        SELECT 
            p.idProjeto,
            p.titulo,
            p.descricao,
            p.dataInicio,
            p.dataFim,
            p.data_cadastro,
            p.status,
            p.qtdeVagas,
            p.idProfessor,
            'Monitoria' AS tipo_projeto
        FROM 
            projeto p
        JOIN 
            monitoria m ON p.idProjeto = m.idMonitoria
        
        UNION ALL

        SELECT 
            p.idProjeto,
            p.titulo,
            p.descricao,
            p.dataInicio,
            p.dataFim,
            p.data_cadastro,
            p.status,
            p.qtdeVagas,
            p.idProfessor,
            'Extensão' AS tipo_projeto
        FROM 
            projeto p
        JOIN 
            extensao e ON p.idProjeto = e.idExtensao
    ";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($table, $id)
    {
        $sql = "delete from {$table} where idProjeto = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function update($table, $parameters, $id)
    {
        $sql = sprintf(
            'update %s set %s where idProjeto = %s',
            $table,
            implode(', ', array_map(function ($key) {
                return "{$key} = :{$key}";
            }, array_keys($parameters))),
            $id
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}