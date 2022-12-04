<head>
  <?php include './scripts/header.php'; ?>
  <style>
    <?php include './assets/css/sidenav.css'; ?>
  </style>
</head>
<body>
  <div id="sidenav-container">
    <h1>Rares's Shop</h1>
   <a href="dashboard.php">
    <div class="list-item">
        <i class="fa-solid fa-house"></i>
        <p class="title">
          Dashboard
        </p>
    </div>
   </a>

   <a href="add-product.php">
    <div class="list-item">
      <i class="fa-solid fa-plus"></i>
      <p class="title">
        Add product
      </p>
    </div>
   </a>

    <a href="products.php">
      <div class="list-item">
        <i class="fa-solid fa-list"></i>
        <p class="title">
          Products
        </p>
      </div>
    </a>

    <div id="logout" class="list-item">
      <i class="fa-solid fa-arrow-right-from-bracket"></i>
      <p class="title">
        Logout
      </p>
    </div>
  </div>
  <?php include './scripts/imports.php'?>
  <script>
   $(document).ready(function() {
    $("#logout").on("click", function(){
      localStorage.clear();
      window.location.replace("http://localhost:8080/login.php");
    })
   })
  </script>
</body>
