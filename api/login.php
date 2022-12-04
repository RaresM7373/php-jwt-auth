<?php
declare(strict_types=1);

header("Access-Control-Allow-Origin: *");

use Firebase\JWT\JWT;
require_once('./vendor/autoload.php');
include './database/connect.php';


$email = $_POST['email'];
$password = $_POST['password'];

if($email && $password) {
  $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
  $stmt->bind_param('s', $email);
  $stmt->execute();

  $result = $stmt->get_result();
  $row = $result->fetch_row();

  $hashPassword = $row[3];

  echo $password;
  echo "\n";
  echo $hashPassword;
  echo "\n";
  echo trim($hashPassword, " ");

  if( password_verify("parola", "$2y$10$1C1P2K/rf3BrusEzUz9AAugJlHOD3lYQbkycE5T1ZCQHG8blfSCyG")) {
    $secretKey  = 'JWT_SECRET_KEY';
    $issuedAt   = new DateTimeImmutable();
    $expire     = $issuedAt->modify('+30 minutes')->getTimestamp();      
    $serverName = "localhost";
    $username   = $email;   
    
    $data = [
      'iat'  => $issuedAt->getTimestamp(),         
      'iss'  => $serverName,                       
      'nbf'  => $issuedAt->getTimestamp(),          
      'exp'  => $expire,                           
      'userName' => $username,
    ];
    
    echo 'Hello';
    echo JWT::encode(
      $data,
      $secretKey,
      'HS512'
    );

  } else {
    http_response_code(403);
    die('Forbidden');
  }
}
