<?php
chdir(dirname(__DIR__));

require_once('../vendor/autoload.php');

if (!preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {
  header('HTTP/1.0 400 Bad Request');
  echo 'Token not found in request';
  exit;
} else {
  $jwt = $matches[1];
  if (! $jwt) {
    // No token was able to be extracted from the authorization header
    header('HTTP/1.0 400 Bad Request');
    exit;
  }
}