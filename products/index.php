<?php
include '../config/db.php';

$stmt = $pdo->query("SELECT p.id, p.name, p.description, p.price, c.name AS category_name, p.status, p.image
                     FROM products p
                     LEFT JOIN categories c ON p.category_id = c.id");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }
    .table-container {
        margin-top: 50px;
    }
    .img-thumb {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }
</style>
</head>
<body>

<div class="container table-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Products List</h2>

        <div class="btn-group gap-3">
            <a href="add.php" class="btn btn-success">Add New Product</a>
            <a href="../dashboard.php" class="btn text-white"style="background-color: #1dc5bfff;">Back</a>

        </div>
    </div>


    <div class="card shadow-sm">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($products) > 0): ?>
                            <?php foreach($products as $p): ?>
                                <tr>
                                    <td><?= $p['id'] ?></td>
                                    <td><?= htmlspecialchars($p['name']) ?></td>
                                    <td>
                                        <?php if(!empty($p['image']) && file_exists('../uploads/products/'.$p['image'])): ?>
                                            <img src="../uploads/products/<?= $p['image'] ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="img-thumb">
                                        <?php else: ?>
                                            <span>No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($p['description']) ?></td>
                                    <td><?= number_format($p['price'], 2) ?></td>
                                    <td><?= htmlspecialchars($p['category_name']) ?></td>
                                    <td>
                                        <?php if($p['status'] == 'Active'): ?>
                                            <span class="badge bg-success"><?= $p['status'] ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary"><?= $p['status'] ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="8">No products found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
