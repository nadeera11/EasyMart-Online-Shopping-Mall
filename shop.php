<?php
session_start();
include_once 'connect.php';  


$sql = "SELECT * FROM Product"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/shop.css">
</head>
<body>

<div class="shop">
    <?php include 'header.php'; ?>

   
        <h2>Available Products</h2>

        <div class="product-list">
            <?php
            
                while ($product = $result->fetch_assoc()) {
                    echo '<div class="product-item">';
                    echo '<img src="seller_dashboard/uploads/' . $product['image'] . '" width="180px" " height="150px" alt="">';
                    echo '<h3>' . $product['name'] . '</h3>';
                    echo '<p>Price: LKR ' . $product['price'] . '</p>';
                    echo '<a href="product_description.php?id=' . $product['product_id'] . '" class="btn">View Product</a>';
                    echo '</div>'; 
                }
           
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>

<?php

$conn->close();
?>
