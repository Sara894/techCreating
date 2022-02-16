<?php
function getAllTasks()
{
    //подключение к бд
    $pdo = new PDO("mysql:host=localhost; dbname=tech;", "root", "");
    //запрос к бд
    $sql = "SELECT * FROM tasks";
    $statement = $pdo->prepare($sql);//подготовили запрос к бд
    $statement->execute();//отправка запроса к бд
    $tasks = $statement->fetchAll(PDO::FETCH_OBJ);//получаем все записи из таблицы
    return $tasks;
}

$tasks = getAllTasks();
?>

<!docktype html>
    <html lang="ru">

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>All articles</h1>
                    <a href="/create.php" class="btn btn-success">Add new article</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tasks as $task) : ?>
                                <tr>
                                    <td><?= $task->id ?></td>
                                    <td><?= $task->title ?></td>
                                    <td>
                                        <a href="/show.php?id=<?= $task->id ?>" class="btn btn-primary">Show</a>
                                        <a href="/edit.php?id=<?= $task->id ?>" class="btn btn-warning">Edit</a>
                                        <a href="/delete.php?id=<?= $task->id ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>