<?php include '../config/db.php';
if(isset($_POST['save'])){
$stmt=$pdo->prepare("INSERT INTO categories(name,status) VALUES(?,?)");
$stmt->execute([$_POST['name'],$_POST['status']]);
header("Location: index.php");
}
?>
<form method="post">
<input name="name" required>
<select name="status">
<option>Active</option>
<option>Inactive</option>
</select>
<button name="save">Save</button>
</form>
