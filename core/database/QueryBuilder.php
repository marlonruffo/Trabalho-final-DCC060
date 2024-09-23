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
                iniciacaocientifica ic ON p.idProjeto = ic.idProjeto -- Aqui ajustamos para usar idProjeto
                
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
                treinamentoprofissional tp ON p.idProjeto = tp.idProjeto -- Ajuste aqui também
            
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
                monitoria m ON p.idProjeto = m.idProjeto -- Ajuste para idProjeto
            
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
                extensao e ON p.idProjeto = e.idProjeto -- Mais um ajuste para idProjeto
        ";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertProjeto($table, $parameters)
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

    public function deleteProjeto($table, $id)
    {
        $sql = "delete from {$table} where idProjeto = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function updateProjeto($table, $parameters, $id)
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

    public function select_disciplinas_feitas($cpf)
    {
        $sql  = "SELECT 
                    d.nome AS NomeDisciplina,
                    d.idDisciplina AS idDisciplina,
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


    public function delete($table, $idAluno, $idDisciplina)
{
    $sql = sprintf(
        'DELETE FROM %s WHERE idAluno = :idAluno AND idDisciplina = :idDisciplina;',
        $table
    );

    try {
        $statement = $this->pdo->prepare($sql);


        $statement->execute(compact('idAluno', 'idDisciplina'));
    } catch (Exception $e) {
        die(header('Location: disciplinas'));
    }
}

}