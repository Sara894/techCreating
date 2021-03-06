<?php
include 'database/QueryBuilder.php';
$db = new QueryBuilder();
//$task = $db->getOneArticle();
$article = $db->getOne("tasks",$_GET['id']);
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
            <div class="col-md-12">
                <h1>Edit Article</h1>
                <form action="/update.php?id=<?= $article->id ?>" method="post">
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" value="<?= $article->title ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10"><?= $article->content ?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>