<?php
// session_start();
include '../config/db.php';

$error = "";

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->execute([$u,$p]);

    if($stmt->rowCount()){
        $_SESSION['user'] = $u;
        header("Location:../dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | Product & Category Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),
    url("https://i.pinimg.com/1200x/71/ab/85/71ab858345d28dbe01f5da6c96f90c21.jpg");
    background-size: cover;
    background-position: center;
}
.login-card{ border-radius:20px; }
</style>
</head>
<body>

<div class="container">
<div class="row justify-content-center align-items-center vh-100">
<div class="col-md-4">

<div class="card login-card shadow-lg p-4">
<div class="text-center mb-4">
<h3 class="fw-bold">Admin Login</h3>
<p class="text-muted">Sign in to continue</p>
</div>

<?php if($error): ?>
<div class="alert alert-danger text-center"><?php echo $error; ?></div>
<?php endif; ?>

<form method="POST">
<div class="mb-3">
<label>Username</label>
<input type="text" name="username" class="form-control" placeholder="Enter username" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" placeholder="Enter password" required>
</div>

<button type="submit" name="login" class="btn btn-primary w-100">Login</button>
</form>

</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
