<?php
include 'database/QueryBuilder.php';
$db = new QueryBuilder();
//$task = $db->getOneArticle();
$article = $db->getOne("tasks", $_GET['id']);
$article = $article[0];

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
                <h1><?=$article->title?></h1>
                <p>
                    <?=$article->content?>
                </p>
                <a href="/">Go back</a>
            </div>
        </div>
    </div>
</body>

</html>