<?php
//creating article
require 'database\QueryBuilder.php';
$db = new QueryBuilder();
//$db->addArticle($_POST['title'], $_POST['content']);
$db->store("tasks",$_POST);
header("Location: /");