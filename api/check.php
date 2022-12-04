<?php
declare(strict_types=1);
$jwt = $_POST['token'];

header("Access-Control-Allow-Origin: *");

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once('./vendor/autoload.php');
include './database/connect.php';

$secretKey  = 'JWT_SECRET_KEY';

function accessDenied() {
  http_response_code(401);
  die('Access is forbidden');
}

try {
  if($jwt && isset($jwt)) {
    echo $jwt;
    $token = JWT::decode($jwt, new Key($secretKey, 'HS512'));
  
    $now = new DateTimeImmutable();
    $serverName = "localhost";
  
    if ($token->iss !== $serverName || $token->nbf > $now->getTimestamp() || $token->exp < $now->getTimestamp()) {
      header('HTTP/1.1 401 Unauthorized');
      exit;
    }
  } else {
    accessDenied();
  }
} catch(Exception $e) {
  accessDenied();
}

