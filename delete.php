<?
//deleting article
function deleteArticle($data){
    $pdo = new PDO("mysql:host=localhost;dbname=tech;","root","");
    $sql = "DELETE FROM tasks WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute($data);
    header("Location: /");
}
$data = [
    'id'=>$_GET['id']
];
deleteArticle($data);
?>