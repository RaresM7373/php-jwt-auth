<head>
  <?php include './scripts/header.php' ?> 
  <style>
    <?php include './assets/css/dashboard.css'; ?>
  </style>
</head>
<body>
  <div class="screen-content">
    <?php include './scripts/sidenav.php'; ?>
    <div id="content-container">
      <h1 class="title" style="margin-bottom: 48px;">Your  <span>products</span></h1>
      <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Description</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $conn = new mysqli("database", 'web-user', 'password', 'web-3');
          
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          
          $stmt = $conn->prepare("SELECT * FROM products");
          $stmt->execute();

          $result = $stmt->get_result();        

          while($row = $result->fetch_assoc()) {
            echo '<tr><th scope="row">'.$row['id'].'</th>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['price'].'</td>';
            echo '<td>'.$row['description'].'</td>';
            echo '<td><img src="'.$row['imageUrl'].'" style="width: 50px; height: 50px;" /></td>';
          }
        ?>
      </tbody>
    </table>
    </div>
  </div>  
  
  <?php include './scripts/imports.php'?>
  <script>
   $(document).ready(function() {
    const token = localStorage.getItem('access_token');
    $.ajax({
      url: 'http://localhost:8081/check.php',
      type: 'POST',
      data: {
        token: token
      },
      success: function () {
        console.log("success")
       },
      error: function () { 
        console.log('error')
      },
    });
    
   })
  </script>
</body>