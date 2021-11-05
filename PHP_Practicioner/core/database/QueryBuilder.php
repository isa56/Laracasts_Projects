<?php

class QueryBuilder{

    protected $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function selectAll($table){

        $statement = $this->pdo->prepare("select * from php_learning.$table");

        $statement->execute();

        $tarefas = $statement->fetchAll(PDO::FETCH_CLASS);

        return $tarefas;

    }

    public function insert($tableName, $parameters){

        $keys =  array_keys($parameters);

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $tableName,
            implode(',', $keys),
            ':' . implode(', :', $keys)
        );

        try{
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch(Exception $e){
            die('Whoopsies, something went wrong |||||||||||||||| ' . $e->getMessage());
        }

    
    }


}