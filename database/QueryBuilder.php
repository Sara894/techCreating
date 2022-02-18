<?php
class QueryBuilder
{
    public $pdo;
    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost; dbname=tech;", "root", "");
    }
    function getAll__Articles()
    {
        //подключение к бд
        //запрос к бд
        $sql = "SELECT * FROM tasks";
        $statement = $this->pdo->prepare($sql); //подготовили запрос к бд
        $statement->execute(); //отправка запроса к бд
        $tasks = $statement->fetchAll(PDO::FETCH_OBJ); //получаем все записи из таблицы

        return $tasks;
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
