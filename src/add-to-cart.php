<?php 

session_start();

if(empty($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET['id']);

?>

<!DOCTYPE html>
<head>
  <?php 
    include './scripts/header.php';?>
  <style>
    <?php include './assets/css/shop.css' ?>
  </style>
</head>
<body>
  <div id="cart-container">
    <h1 id="title" style="margin-bottom: 48px;">
      Product added.
    </h1>
    <a href="index.php">Add some more</a>
  </div>
  <?php include './scripts/imports.php';?>
</body>
</html>