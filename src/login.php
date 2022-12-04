<!DOCTYPE html>
<html lang="en">
<head>
<?php include './scripts/header.php'?>
<style>
    <?php include('./assets/css/auth.css');?>
  </style>
</head>
<body class="container">
  <h1 class="page-title">Log in</h1>
  <span class="page-desc"> Welcome back, you've been missed ! </span>
  <form method="POST" class="login-form form" id="register-form">
    <input id="email" type="email" name="email" class="input" placeholder="Enter email address" />
    <input id="password" type="password" name="password" class="input" placeholder="Password" />
    <input type="submit" value="Login" class="send-btn btn" />
  </form>
  <p id="error" class="error-text"></p>
  <a href="register.php">Create account</a>
  <?php include './scripts/imports.php'?>
  <script>
   $(document).ready(function() {

    $( "#register-form" ).submit(function( event ) {
      event.preventDefault();

      const email = $('#email').val()
      const password = $('#password').val()

      $.ajax({
        type: "POST",
        url: "http://localhost:8081/login.php",
        data: {
          email: email,
          password: password,
        },
        success: function(data, status) {
          if(status === 'success') {
            // window.location.replace("http://localhost:8080/dashboard.php");
          } else {
            alert('A aparut o problema');
          }
        },
        error(error) {
          console.log("Error status", error.status);
          if(error.status == 403) {
            $('#error').html('Email sau parola gresita, mai incearca!');
          }
        }
      });
    });
   })
  </script>
</body>
</html>
