<?php
include '../config/db.php';


$stmt = $pdo->query("SELECT p.id, p.name, p.description, p.price, c.name AS category_name, p.status
                     FROM products p
                     LEFT JOIN categories c ON p.category_id = c.id");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #aaa;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        a.button {
            padding: 4px 10px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }
        a.button.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<h1>Products</h1>

<a href="add.php" class="button">Add New Product</a>
<br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
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
                    <td><?= htmlspecialchars($p['description']) ?></td>
                    <td><?= number_format($p['price'], 2) ?></td>
                    <td><?= htmlspecialchars($p['category_name']) ?></td>
                    <td><?= $p['status'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $p['id'] ?>" class="button">Edit</a>
                        <a href="delete.php?id=<?= $p['id'] ?>" class="button delete" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No products found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
