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
      <h1 class="title">New <span>product</span> </h1>

      <div class="inputs-container">
      <input type="text" id="name" placeholder="Enter a product name">
      <input type="number" id="price" placeholder="Enter huge price here">
      <input type="text" id="description" placeholder="Add some description">
      <input type="text" id="imageUrl" placeholder="Add a link to your product's image">
      <button id="create-product" class="mbtn">Add product</button>
      </div>
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

    $("#create-product").on('click' ,function (event) {
      const name = $('#name').val();
      const description = $('#description').val();
      const price = $('#price').val();
      const imageUrl = $('#imageUrl').val();

      console.log("description", description)

      $.ajax({
        url: 'http://localhost:8081/add-product.php',
        type: 'POST',
        data: {
          name,
          description,
          imageUrl,
          price
        },
        success: function () {
          alert('Produsul a fost adaugat cu succes!');
        },
        error: function () { 
          alert('A aparut o problema, varugam incercati mai tarziu');
        },
      });
    })
   })
  </script>
</body>