<?php
include '../config/db.php';

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT image FROM products WHERE id=?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if($product){
  
    $imgPath = '../uploads/products/'.$product['image'];
    if(!empty($product['image']) && file_exists($imgPath)){
        unlink($imgPath);
    }

    $stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
