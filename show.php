<?php
function getOneArticle(){
    $pdo = new PDO("mysql:host=localhost;dbname=tech","root","");
    $sql = "SELECT * FROM tasks WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id'=>$_GET['id']]);
    $task = $statement->fetchAll(PDO::FETCH_OBJ);
    return $task;
    //showing article
}
$task = getOneArticle();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1><?=$task[0]->title?></h1>
                <p>
                    <?=$task[0]->content?>
                </p>
                <a href="/">Go back</a>
            </div>
        </div>
    </div>
</body>

</html>