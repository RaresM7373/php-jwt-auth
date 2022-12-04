<?php
session_start();


$conn = new mysqli("database", 'web-user', 'password', 'web-3');
                  
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



if(!empty($_SESSION['cart'])) {
  $whereIn = implode(',', $_SESSION['cart']);

  $stmt = $conn->prepare("SELECT * FROM products WHERE id IN ($whereIn)");
  $stmt->execute();

  $result = $stmt->get_result();
  }
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
  <?php
    if(empty($_SESSION['cart'])) {
      echo ' <div id="cart-container">
      <h1 id="title" style="margin-bottom: 48px;">
        Cart is empty.
      </h1> <a href="index.php">Back to shopping</a></div>';
  
    } else {
  ?>
  <div id="cart-container">
    <h1 id="title" style="margin-bottom: 48px;">
      Your cart
    </h1>
    <div id="products-row">
      <?php
        while($row = $result->fetch_assoc()) {
          echo ' <div class="product-card"><img src="'.$row['imageUrl'].'" /><p class="name">'.$row['name'].'</p><p class="description">'.$row['description'].'</p><p class="price">$ '.$row['price'].'</p></div>';
        }
      ?>
    </div>

    <button id="buy-btn" class="btn btn-primary">Buy Items</button>
  </div>
  <?php } ?>
  <?php include './scripts/imports.php';?>
  <script src="./javascript/confetti.min.js"></script>
  <script>
    $(document).ready(function() {

      $("#buy-btn").on('click', function() {
        setTimeout(() => {
          window.location.replace("http://localhost:8080/purchase-complete.php");
        }, 3000);
      })
    })
  </script>
  <script>



    const confetti = new Confetti('buy-btn');
    confetti.setCount(75);
    confetti.setSize(1);
    confetti.setPower(25);
    confetti.setFade(false);
  </script>

</body>
</html>