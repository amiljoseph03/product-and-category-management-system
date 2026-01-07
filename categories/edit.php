<?php
include '../config/db.php';

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$id]);
$category = $stmt->fetch();

if(!$category){
    echo "Category not found!";
    exit;
}


if(isset($_POST['update'])){
    $imageName = $category['image']; 


    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $uploadDir = '../uploads/';
        if(!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

     
        if(!empty($imageName) && file_exists($uploadDir.$imageName)){
            unlink($uploadDir.$imageName);
        }

        $imageName = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$imageName);
    }

    $stmt = $pdo->prepare("UPDATE categories SET name = ?, status = ?, image = ? WHERE id = ?");
    $stmt->execute([$_POST['name'], $_POST['status'], $imageName, $id]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Category</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    #preview {
        width: 100%;
        max-height: 300px;
        object-fit: contain;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }
</style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header text-white text-center" style="background-color: #9d1157ff;">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Active" <?= $category['status']=='Active'?'selected':'' ?>>Active</option>
                                <option value="Inactive" <?= $category['status']=='Inactive'?'selected':'' ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Category Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            <?php if(!empty($category['image']) && file_exists('../uploads/'.$category['image'])): ?>
                                <img id="preview" src="../uploads/<?= $category['image'] ?>" alt="Current Image">
                            <?php else: ?>
                                <img id="preview" style="display:none;" alt="Image Preview">
                            <?php endif; ?>
                        </div>
                        <button type="submit" name="update" class="btn w-100" style="background-color: #1fc56cff;">Update Category</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php" class="btn btn-secondary btn-sm" style="background-color: #1dc5bfff;">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');

    if(input.files && input.files[0]){
        const reader = new FileReader();
        reader.onload = function(e){
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</body>
</html>
