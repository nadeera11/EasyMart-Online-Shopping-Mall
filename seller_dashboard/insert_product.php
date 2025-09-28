<?php
include '../connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/products.css">
</head>
<body>

<div class="btn-content">

<img src="../images/orange11.gif" id="gif">

<?php

session_start();


if(isset($_POST['add_product'])){
    $sellerid=$_SESSION['user_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    
  
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $image = $_FILES["image"]["name"];

}
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        
        $sql = "INSERT INTO product (name,price,quantity, description,image,sellerid) VALUES ('$name','$price','$quantity', '$description', '$image','$sellerid')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New product added successfully! ";
        } else {
            echo "Error: " ;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }


$conn->close();

?>

<a href='view_products.php' class="btn2">View Products</a>
</div>
    
</body>
</html>
