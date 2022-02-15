<?php
$sql = "INSERT INTO tasks (title,content) VALUES (:title, :content)";
$pdo = new PDO("mysql:host=localhost;dbname=tech;","root","");
$statement = $pdo->prepare($sql);
$result = $statement->execute([
    'title'=>$_POST['title'],
    'content'=>$_POST['content']
]);

