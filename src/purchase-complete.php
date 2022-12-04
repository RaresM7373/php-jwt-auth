<?php
  session_start();
  unset($_SESSION['counter']);
  session_destroy();
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
      Thank you for your order!
    </h1>
    <a href="index.php">Back to shopping</a>
  </div>
  <?php include './scripts/imports.php';?>
</body>
</html>