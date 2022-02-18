<?
//deleting article
include 'database/QueryBuilder.php';
$db = new QueryBuilder();
$db->delete("tasks",$_GET['id']);
header("Location: /");
?>