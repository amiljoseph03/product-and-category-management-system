<?php 
include '../config/db.php';
$cats = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Category List</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }
    .table-container {
        margin-top: 50px;
    }
    .img-thumb {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
    }
</style>
</head>
<body>

<div class="container table-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Category List</h2>

        <div class="btn-group gap-3">
            <a href="add.php" class="btn btn-success">Add New Category</a>
            <a href="../dashboard.php" class="btn text-white"style="background-color: #1dc5bfff;">Back</a>

        </div>
    </div>

    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cats as $c): ?>
                    <tr>
                        <!-- <td><?= $c['id'] ?></td> -->
                        <td  class="text-start ps-5 fw-semibold"><?= htmlspecialchars($c['name']) ?></td>
                        <td>
                            <?php if(!empty($c['image']) && file_exists("../uploads/".$c['image'])): ?>
                                <img src="../uploads/<?= $c['image'] ?>" alt="<?= htmlspecialchars($c['name']) ?>" class="img-thumb">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($c['status'] == 'Active'): ?>
                                <span class="badge bg-success"><?= $c['status'] ?></span>
                            <?php else: ?>
                                <span class="badge bg-secondary"><?= $c['status'] ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="delete.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($cats)) echo '<tr><td colspan="5">No categories found.</td></tr>'; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
