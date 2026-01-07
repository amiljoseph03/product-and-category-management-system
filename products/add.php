<?php include '../config/db.php';

$cats = $pdo->query("SELECT * FROM categories WHERE status='Active'")->fetchAll();

if(isset($_POST['save'])){
$stmt=$pdo->prepare("INSERT INTO products(name,description,price,category_id,status)
VALUES(?,?,?,?,?)");
$stmt->execute([$_POST['name'],$_POST['description'],$_POST['price'],$_POST['category'],$_POST['status']]);
header("Location: index.php");
}
?>
<form method="post">
<input name="name">
<textarea name="description"></textarea>
<input name="price">
<select name="category">
<?php foreach($cats as $c){ ?>
<option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
<?php } ?>
</select>
<select name="status">
<option>Active</option><option>Inactive</option>
</select>
<button name="save">Save</button>
</form>
