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
      <h1 class="title">Welcome <span>Rares</span> !</h1>
    </div>
  </div>  
  
  <?php include './scripts/imports.php'?>
  <script>
   $(document).ready(function() {
    const token = localStorage.getItem('access_token');
    console.log('TOken', token)
    $.ajax({
      url: 'http://localhost:8081/check.php',
      type: 'POST',
      data: {
        token: token
      },
      success: function () {},
      error: function () { 

        window.location.replace("http://localhost:8080/login.php");
      },
    });
   })
  </script>
</body>