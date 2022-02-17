<?php
//creating article
require 'database\QueryBuilder.php';
$db = new QueryBuilder();
$db->addArticle($_POST['title'], $_POST['content']);
header("Location: /");