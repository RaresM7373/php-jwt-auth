<head>
  <?php include './scripts/header.php' ?> 
</head>
<body>
  <script>
   $(document).ready(function() {
    $.ajax({
      url: 'http://loclahost:8081/check',
      type: 'GET',
      beforeSend: function (xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer t-7614f875-8423-4f20-a674-d7cf3096290e');
      },
      data: {},
      success: function () { },
      error: function () { },
    });
   })
  </script>
</body>