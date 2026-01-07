<?php include 'config/db.php';

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
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
<div class="container-fluid">
<span class="navbar-brand fw-bold">PCMS Dashboard</span>
<div class="d-flex">
<span class="text-white me-3">Welcome, <?php echo $_SESSION['user']; ?></span>
<a href="auth/logout.php" class="btn btn-danger btn-sm">Logout</a>
</div>
</div>
</nav>

<div class="container-fluid">
<div class="row">


<div class="col-md-2 bg-white shadow-sm min-vh-100 p-3">
<h6 class="text-muted">MAIN MENU</h6>
<ul class="nav flex-column mt-3">
<li class="nav-item"><a href="dashboard.php" class="nav-link active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
<li class="nav-item"><a href="categories/add.php" class="nav-link"><i class="bi bi-tags"></i> Categories</a></li>
<li class="nav-item"><a href="categories/index.php" class="nav-link"><i class="bi bi-tags"></i>View Categories</a></li>
<li class="nav-item"><a href="products/add.php" class="nav-link"><i class="bi bi-box"></i> Products</a></li>
<li class="nav-item"><a href="products/index.php" class="nav-link"><i class="bi bi-box"></i> View Products</a></li>
</ul>
</div>


<div class="col-md-10 p-4">

<h3 class="fw-bold mb-4">Dashboard Overview</h3>

<div class="row g-4">
<div class="col-md-4">
<div class="card shadow-sm p-3">
<h6>Total Categories</h6>
<h2><?= $totalCats ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card shadow-sm p-3">
<h6>Total Products</h6>
<h2><?= $totalPro ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card shadow-sm p-3">
<h6>Active Products</h6>
<h2> <?= $active ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card shadow-sm p-3">
<h6>InActive Products</h6>
<h2> <?= $inactive ?></h2>
</div>
</div>

</div>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


