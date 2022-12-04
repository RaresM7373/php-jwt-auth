<!DOCTYPE html>
<html lang="en">
<head>
<?php include './scripts/header.php'?>
<style>
    <?php include('./assets/css/auth.css');?>
  </style>
</head>
<body class="container">
  <h1 class="page-title">Register</h1>
  <span class="page-desc"> Create a neww account! </span>
  <form method="POST" class="login-form form" id="register-form">
    <input id="firstName" type="text" name="firstName" class="input" placeholder="First name" />
    <input id="lastName" type="text" name="lastName" class="input" placeholder="Last name" />
    <input id="email" type="email" name="email" class="input" placeholder="Enter email address" />
    <input id="password" type="password" name="password" class="input" placeholder="Password" />
    <input type="submit" value="Create account" class="send-btn btn" />
  </form>
  <a href="login.php">Back to login</a>
  <?php include './scripts/imports.php'?>
  <script>
   $(document).ready(function() {

    $( "#register-form" ).submit(function( event ) {
      event.preventDefault();


      const firstName = $('#firstName').val()
      const lastName = $('#lastName').val()
      const email = $('#email').val()
      const password = $('#firstName').val()

      $.ajax({
        type: "POST",
        url: "http://localhost:8081/register.php",
        data: {
          firstName: firstName,
          lastName: lastName,
          email: email,
          password: password,
        },
        success: function(data, status) {
          if(status === 'success') {
            alert('Inregistrare efectuata cu succes!');
          } else {
            alert('A aparut o problema');
          }
        } 
      });
    });
   })
  </script>
</body>
</html>
