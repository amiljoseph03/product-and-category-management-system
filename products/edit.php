<?php
include '../config/db.php';

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if(!$product){
    echo "Product not found!";
    exit;
}


$cats = $pdo->query("SELECT * FROM categories WHERE status='Active'")->fetchAll();

if(isset($_POST['update'])){
    $imageName = $product['image']; 

  
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $uploadDir = '../uploads/products/';
        if(!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $imageName = time().'_'.basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$imageName);

        if(!empty($product['image']) && file_exists($uploadDir.$product['image'])){
            unlink($uploadDir.$product['image']);
        }
    }


    $stmt = $pdo->prepare("UPDATE products SET name=?, description=?, price=?, category_id=?, status=?, image=? WHERE id=?");
    $stmt->execute([
        $_POST['name'],
        $_POST['description'],
        $_POST['price'],
        $_POST['category'],
        $_POST['status'],
        $imageName,
        $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .img-preview {
        width: 150px; 
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
    }
</style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-white text-center" style="background-color: #9d1157ff;">
                    <h4>Edit Product</h4>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3"><?= htmlspecialchars($product['description']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" name="price" value="<?= $product['price'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category" required>
                                <?php foreach($cats as $c): ?>
                                    <option value="<?= $c['id'] ?>" <?= $product['category_id']==$c['id']?'selected':'' ?>>
                                        <?= htmlspecialchars($c['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="Active" <?= $product['status']=='Active'?'selected':'' ?>>Active</option>
                                <option value="Inactive" <?= $product['status']=='Inactive'?'selected':'' ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Image</label><br>
                        
                            <img id="imgPreview" 
                                 src="<?= (!empty($product['image']) && file_exists('../uploads/products/'.$product['image'])) ? '../uploads/products/'.$product['image'] : '' ?>" 
                                 class="img-preview" 
                                 alt="Product Image"><br>
                            <input type="file" class="form-control" name="image" accept="image/*" id="imageInput">
                        </div>
                        <button type="submit" name="update" class="btn w-100" style="background-color: #1fc56cff;">Update Product</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php" class="btn btn-secondary btn-sm" style="background-color: #1dc5bfff;">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.getElementById('imageInput').addEventListener('change', function(event){
    const [file] = event.target.files;
    if(file){
        const preview = document.getElementById('imgPreview');
        preview.src = URL.createObjectURL(file);
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
