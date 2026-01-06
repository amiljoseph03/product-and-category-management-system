<?php
$host = "localhost";
$dbname = "product_and_category";
$user = "root";
$pass = "";   

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    session_start();  
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
