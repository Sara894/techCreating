<?

function updateArticle($data){
    //updating article
$pdo = new PDO("mysql:host=localhost;dbname=tech","root","");
$sql="UPDATE tasks SET title=:title, content=:content WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->execute($data);
header('Location: /');
}
$data = [
    'id'=>$_GET['id'],
    'title'=>$_POST['title'],
    'content'=>$_POST['content']
];
updateArticle($data);
?>