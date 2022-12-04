<?php
$conn = new mysqli("database", 'web-user', 'password', 'web-3');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>