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
}
?>