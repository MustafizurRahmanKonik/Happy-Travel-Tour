<?php
require_once "config.php";

$image_path = $_POST['image_path'];
$title = $_POST['title'];
$descriptions = $_POST['descriptions'];
$price = $_POST['price'];
$offer_price = $_POST['offer_price'];

$sql = "INSERT INTO packages (image_path, title, descriptions, price, offer_price) VALUES ('$image_path', '$title', '$descriptions', '$price', '$offer_price')";


if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
    header("refresh:2, url=adminpanel.php");
  } else {
    echo "Error: " . $sql . "<br>" . $link->error;
    
  }
  
  $link->close();
?>