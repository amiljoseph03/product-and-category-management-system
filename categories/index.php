<?php include '../config/db.php';
$cats=$pdo->query("SELECT * FROM categories")->fetchAll();
foreach($cats as $c){
echo $c['name']." | ".$c['status']." 
<a href='edit.php?id={$c['id']}'>Edit</a>
<a href='delete.php?id={$c['id']}'>Delete</a><br>";
}
