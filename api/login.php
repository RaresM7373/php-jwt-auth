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

  if(password_verify('parola', $hashPassword)) {
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
