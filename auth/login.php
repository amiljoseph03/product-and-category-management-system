<?php
include '../config/db.php';

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->execute([$u,$p]);

    if($stmt->rowCount()){
        $_SESSION['user'] = $u;
        header("Location: ../dashboard.php");
    } else {
        echo "Invalid Login";
    }
}
?>
<form method="post">
<input name="username" placeholder="Username">
<input type="password" name="password">
<button name="login">Login</button>
</form>
