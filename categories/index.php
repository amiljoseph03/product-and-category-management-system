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
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }
    .table-container {
        margin-top: 50px;
    }
</style>
</head>
<body>

<div class="container table-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Category List</h2>
        <a href="add.php" class="btn btn-success">Add New Category</a>
    </div>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach($cats as $c): ?>
                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= htmlspecialchars($c['name']) ?></td>
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
                    <?php if(empty($cats)) echo '<tr><td colspan="4">No categories found.</td></tr>'; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
