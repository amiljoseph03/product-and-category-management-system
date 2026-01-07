<?php
include '../config/db.php';


$cats = $pdo->query("SELECT * FROM categories WHERE status='Active'")->fetchAll();


if(isset($_POST['save'])){
    $imageName = null;
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $uploadDir = '../uploads/products/';
        if(!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $imageName = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$imageName);
    }

    $stmt = $pdo->prepare("INSERT INTO products(name, description, price, category_id, status, image) VALUES(?,?,?,?,?,?)");
    $stmt->execute([
        $_POST['name'],
        $_POST['description'],
        $_POST['price'],
        $_POST['category'],
        $_POST['status'],
        $imageName
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
<title>Add Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    #preview {
        width: 100%;
        max-height: 300px;
        object-fit: contain;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        display: none;
    }
</style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-white text-center" style="background-color: #9d1157ff;">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <?php foreach($cats as $c): ?>
                                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            <img id="preview" alt="Image Preview">
                        </div>
                        <button type="submit" name="save" class="btn w-100" style="background-color: #1fc56cff;">Save Product</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="../dashboard.php" class="btn btn-secondary btn-sm" style="background-color: #1dc5bfff;">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
function previewImage(event){
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>

</body>
</html>
