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

    function addArticle($title, $content)
    {
        $sql = "INSERT INTO tasks (title,content) VALUES (:title, :content)";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute([
            'title' => $title,
            'content' => $content
        ]);
    }

    function getOneArticle()
    {
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $_GET['id']]);
        $task = $statement->fetchAll(PDO::FETCH_OBJ);
        return $task;
        //showing article
    }

    function getOne($table,$id){
        $sql = "SELECT * FROM $table WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id'=>$id]);
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function updateArticle($data)
    {
        //updating article
        $sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    function deleteArticle($data){
        $sql = "DELETE FROM tasks WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }
}
