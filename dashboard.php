<?php
include 'config/db.php';

if(!isset($_SESSION['user'])){
    header("Location: auth/login.php");
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
?>



<?php 
// include 'config/db.php';

$totalCats = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$totalPro = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$active = $pdo->query("SELECT COUNT(*) FROM products WHERE status='Active'")->fetchColumn();
$inactive = $pdo->query("SELECT COUNT(*) FROM products WHERE status='Inactive'")->fetchColumn();
?>
<!-- <h2>Dashboard</h2>
Total Categories: <?= $totalCats ?><br>
Total Products: <?= $totalPro ?><br>
Active Products: <?= $active ?><br>
Inactive Products: <?= $inactive ?><br> -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
.dashboard-card {
    border-radius: 20px;
    border: none;
    background: linear-gradient(135deg, #ffffff, #f4f6ff);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    transition: all .3s ease;
    position: relative;
}

.dashboard-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}
</style>
</head>

<body class="bg-light">


<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">PCMS Dashboard</span>
        <div class="d-flex align-items-center">
            <span class="text-white me-3">
                Welcome, <?= htmlspecialchars($_SESSION['user']) ?>
            </span>
            <a href="auth/logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
<div class="row">


<div class="col-md-2 bg-white shadow-sm min-vh-100 p-3">
    <h6 class="text-muted">MAIN MENU</h6>
    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="categories/add.php" class="nav-link">
                <i class="bi bi-tags"></i> Add Category
            </a>
        </li>
        <li class="nav-item">
            <a href="categories/index.php" class="nav-link">
                <i class="bi bi-tags"></i> View Categories
            </a>
        </li>
        <li class="nav-item">
            <a href="products/add.php" class="nav-link">
                <i class="bi bi-box"></i> Add Product
            </a>
        </li>
        <li class="nav-item">
            <a href="products/index.php" class="nav-link">
                <i class="bi bi-box"></i> View Products
            </a>
        </li>
    </ul>
</div>


<div class="col-md-10 p-4">
    <h3 class="fw-bold mb-4">Dashboard Overview</h3>

    <div class="row g-4">


<div class="col-md-3">
    <div class="dashboard-card p-4 text-white" style="background: linear-gradient(135deg, #1dc5bf, #0bbcd6);">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6>Total Categories</h6>
                <h2 class="fw-bold"><?= $totalCats ?></h2>
            </div>
            <i class="bi bi-tags fs-1"></i>
        </div>
    </div>
</div>


   
        <div class="col-md-3">
            <div class="dashboard-card p-4 text-white"style="background: linear-gradient(135deg, #1dc5bf, #0bbcd6);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total Products</h6>
                        <h2 class="fw-bold"><?= $totalPro ?></h2>
                    </div>
                    <i class="bi bi-box fs-1 text-success"></i>
                </div>
            </div>
        </div>

      
        <div class="col-md-3 ">
            <div class="dashboard-card p-4 text-white" style="background: linear-gradient(135deg, #1dc5bf, #0bbcd6);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Active Products</h6>
                        <h2 class="fw-bold"><?= $active ?></h2>
                    </div>
                    <i class="bi bi-check-circle fs-1 text-info"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3 ">
            <div class="dashboard-card p-4 text-white"  style="background: linear-gradient(135deg, #1dc5bf, #0bbcd6);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Inactive Products</h6>
                        <h2 class="fw-bold"><?= $inactive ?></h2>
                    </div>
                    <i class="bi bi-x-circle fs-1 text-danger"></i>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
