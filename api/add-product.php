<?php 
header("Access-Control-Allow-Origin: *");


include './database/connect.php';

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$imageUrl = $_POST['imageUrl'];
// $price = 2;

  
$stmt = $conn->prepare("INSERT INTO products(name, price, imageUrl, description) VALUES (?, ?, ?, ?)");

$stmt->bind_param('siss', $name, $price, $imageUrl, $description);

$result =  $stmt->execute();


// echo $result;
$stmt->close();
$conn->close();
?>

