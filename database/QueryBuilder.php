<?
class QueryBuilder
{
    function getAll__Articles()
    {
        //подключение к бд
        $pdo = new PDO("mysql:host=localhost; dbname=tech;", "root", "");
        //запрос к бд
        $sql = "SELECT * FROM tasks";
        $statement = $pdo->prepare($sql); //подготовили запрос к бд
        $statement->execute(); //отправка запроса к бд
        $tasks = $statement->fetchAll(PDO::FETCH_OBJ); //получаем все записи из таблицы

        return $tasks;
    }

    function addArticle($title, $content)
    {
        $sql = "INSERT INTO tasks (title,content) VALUES (:title, :content)";
        $pdo = new PDO("mysql:host=localhost;dbname=tech;", "root", "");
        $statement = $pdo->prepare($sql);
        $result = $statement->execute([
            'title' => $title,
            'content' => $content
        ]);
    }

    function getOneArticle()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=tech", "root", "");
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $_GET['id']]);
        $task = $statement->fetchAll(PDO::FETCH_OBJ);
        return $task;
        //showing article
    }

    function updateArticle($data)
    {
        //updating article
        $pdo = new PDO("mysql:host=localhost;dbname=tech", "root", "");
        $sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
    }

    function deleteArticle($data){
        $pdo = new PDO("mysql:host=localhost;dbname=tech;","root","");
        $sql = "DELETE FROM tasks WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
    }
}
