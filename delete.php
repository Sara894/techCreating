<?
//deleting article
include 'database/QueryBuilder.php';
$data = [
    'id'=>$_GET['id']
];
$db = new QueryBuilder();
$db->deleteArticle($data);
header("Location: /");
?>