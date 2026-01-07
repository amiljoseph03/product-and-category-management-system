<?php include '../config/db.php';
if(isset($_POST['save'])){
$stmt=$pdo->prepare("INSERT INTO categories(name,status) VALUES(?,?)");
$stmt->execute([$_POST['name'],$_POST['status']]);
header("Location: index.php");
}
?>
<!-- <form method="post">
<input name="name" required>
<select name="status">
<option>Active</option>
<option>Inactive</option>
</select>
<button name="save">Save</button>
</form> -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Category</title>
<!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header text-white text-center" style="background-color: #9d1157ff;">
    <h4>Add Category</h4>
</div>

                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" name="save" class="btn w-100" style="background-color: #1fc56cff;">Save Category</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="../dashboard.php" class="btn btn-secondary btn-sm"  style="background-color: #1dc5bfff;">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>