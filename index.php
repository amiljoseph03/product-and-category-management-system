<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Product & Category Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.hero{
    background: linear-gradient(rgba(143, 12, 71, 0.6), rgba(64, 8, 35, 0.6)),
    url("https://i.pinimg.com/1200x/71/ab/85/71ab858345d28dbe01f5da6c96f90c21.jpg");
    /* url("https://i.pinimg.com/1200x/a6/61/dd/a661dd84e8a2f514cbe6c54215d49899.jpg"); */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: white;
    padding: 180px 0;
}

.card:hover{
    transform: scale(1.05);
    transition:0.3s;
}
</style>
</head>
<body>
<!-- ....................... -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
<a class="navbar-brand fw-bold" href="#">PCMS</a>
<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="nav">
<ul class="navbar-nav ms-auto">
<li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
<li class="nav-item"><a class="nav-link" href="#about">About</a></li>
<li class="nav-item"><a class="nav-link btn btn-primary text-white ms-2" href="auth/login.php">Login</a></li>
</ul>
</div>
</div>
</nav>
<!-- ...........  -->

<section class="hero text-center">
<div class="container">
<h1 class="display-4 fw-bold">Product & Category Management System</h1>
<p class="lead mt-3">Manage your products, categories, and inventory efficiently.</p>
<a href="auth/login.php" class="btn btn-warning btn-lg mt-4">Get Started</a>
</div>
</section>


<!-- .................  -->

<section class="py-5 bg-light" id="features">
<div class="container text-center">
<h2 class="fw-bold mb-5">Key Features</h2>

<div class="row g-4">


<div class="col-md-4">
<div class="card shadow-lg h-100 p-4 rounded-4">
<img src="https://i.pinimg.com/736x/b6/89/85/b68985b22caa53d8cbc1e26206491f5c.jpg" 
     class="img-fluid mx-auto mb-3 w-50 rounded-3">
<h4 class="mt-3">Secure Login</h4>
<p class="fs-6">Session based authentication system.</p>
</div>
</div>


<div class="col-md-4">
<div class="card shadow-lg h-100 p-4 rounded-4">
<img src="https://i.pinimg.com/736x/b2/2e/17/b22e17c95612ff678be527dd06508dfb.jpg" 
     class="img-fluid mx-auto mb-3 w-50 rounded-3">
<h4 class="mt-3">Category Management</h4>
<p class="fs-6">Add, edit, activate or deactivate categories.</p>
</div>
</div>


<div class="col-md-4">
<div class="card shadow-lg h-100 p-4 rounded-4">
<img src="https://i.pinimg.com/736x/71/61/ba/7161baad435064257ea0ee9d1374188d.jpg" 
     class="img-fluid mx-auto mb-3 w-50 rounded-3">
<h4 class="mt-3">Product Management</h4>
<p class="fs-6">Manage products with images, stock & price details.</p>
</div>
</div>

</div>
</div>
</section>


<!-- ...................................  -->

<section class="bg-light py-5" id="about">
<div class="container text-center">
<h2 class="fw-bold mb-3">About This Website</h2>
<p class="w-75 mx-auto">
This Product & Category Management System website is designed to help businesses
manage their products and categories in an organized and efficient way.
Using this website, administrators can easily add, update, delete, activate or deactivate categories,
manage product information such as price, stock and images, and maintain accurate inventory records.
The system helps reduce manual work, improve data accuracy, and save time while keeping product management simple and reliable.
</p>
</div>
</section>

<!-- ................................  -->

<footer class="bg-dark text-white text-center py-3">
<p class="mb-0">© <?php echo date('Y'); ?> Product & Category Management System | Developed by Amil Joseph</p>
</footer>
<!-- .................  -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
