<?php 
header("Access-Control-Allow-Origin: *");

// Create connection
$conn = new mysqli("database", 'web-user', 'password', 'web-3');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  print "Connected successfully";
}


$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$role = 2;

$hash = password_hash($password, PASSWORD_BCRYPT);
  
$stmt = $conn->prepare("INSERT INTO users(firstName, lastName, email, password, role) VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param('ssssi', $firstName, $lastName, $email, $hash, $role);

$result =  $stmt->execute();

echo $hash;

// echo $result;
$stmt->close();
$conn->close();
?>

