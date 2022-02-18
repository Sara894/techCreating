<?php
class QueryBuilder
{
    public $pdo;
    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost; dbname=tech;", "root", "");
    }

    function all($table)
    {
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $articles = $statement->fetchAll(PDO::FETCH_OBJ);

        return $articles;
    }

    function store($table,$data){
        $keys = array_keys($data);
        $stringOfKeys = implode(', ',$keys);
        $stringOfValues = ':'.implode(', :',$keys);
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($stringOfValues)";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute($data);

        return $result;
    }

    function getOne($table,$id){
        $sql = "SELECT * FROM $table WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id'=>$id]);
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function update($table, $data, $id)
    {
        $keys = array_keys($data);
        $placeholders = [];
        $i = 0;
        foreach($keys as &$key ){
            if($key !="id")
              {
                $placeholders[$i] = $key.'=:'.$key;
                $i++;
              }
            
        }
        $placeholders = implode(', ',$placeholders);
        $sql = "UPDATE $table SET $placeholders WHERE id=:$id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }
    
    function deleteArticle($data){
        $sql = "DELETE FROM tasks WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    function delete($table,$id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id'=>$id]);
    }
}
