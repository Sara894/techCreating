<?php
//creating article
function addArticle($title,$content)
{
    $sql = "INSERT INTO tasks (title,content) VALUES (:title, :content)";
$pdo = new PDO("mysql:host=localhost;dbname=tech;","root","");
$statement = $pdo->prepare($sql);
$result = $statement->execute([
    'title'=>$title,
    'content'=>$content
]);

header("Location: /");
}

addArticle($_POST['title'], $_POST['content']);
