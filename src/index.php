<!DOCTYPE html>
<head>
  <?php include './scripts/header.php';?>
  <style>
    <?php include './assets/css/shop.css' ?>
  </style>
</head>
<body>
  <div id="shop-container">
    <div id="header">
      <div></div>
      <h1 id="title">
        Coolest Shop
      </h1>
      <a href="shopping-cart.php">
      <i class="fa-solid fa-cart-shopping"></i>
      </a>
    </div>

    <div id="products-row">
      <?php 
        $conn = new mysqli("database", 'web-user', 'password', 'web-3');
        
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();

        $result = $stmt->get_result();        

        while($row = $result->fetch_assoc()) {
          echo ' <div class="product-card"><img src="'.$row['imageUrl'].'" /><p class="name">'.$row['name'].'</p><p class="description">'.$row['description'].'</p><p class="price">$ '.$row['price'].'</p><a href="add-to-cart.php?id='.$row['id'].'"><button class="btn btn-primary">Add to cart</button></a></div>';
        }
      ?>
    </div>
  </div>
  <?php include './scripts/imports.php';?>
</body>
</html>