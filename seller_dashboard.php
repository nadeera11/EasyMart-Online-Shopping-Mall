<?php
session_start();

require_once 'connect.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

// Fetch information
$user_query = "SELECT firstName, lastName, email, phone_number, address FROM `User` WHERE user_id='$user_id'";
$user_result = $conn->query($user_query);
$user = $user_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include "header.php" ?>
    <div class="box1">
        <div class="box2">
            <div class="sidebar">
                <h2 class="naviTitle">Seller Dashboard</h2>

                <ul id="menu">
                <h3>Products </h3>
                    <p><a href="seller_dashboard/add_product.php">Add Products</a></p>
                    <p><a href="seller_dashboard/view_products.php">View Products</a></p>

                    <h3>Orders Received</h3>
                    <p><a href="seller_dashboard/orders/view_orders.php">View Orders</a></p>

                    <h3>Discounts </h3>
                    <p><a href="seller_dashboard/discount/discountCreate.php">Create Discounts</a></p>
                    <p><a href="seller_dashboard/discount/discountRead.php">View Discounts</a></p>

                    <h3>Your Details</h3>
                    <p><a href="seller_dashboard/details/view_details.php">View Details</a></p>
                    <p><a href="seller_dashboard/details/edit_details.php">Edit Details</a></p>
                </ul>    
            </div>

            <div class="main-content">
                <h3>Welcome <?php echo $user['firstName']; ?></h3>
                <div class="user-details">
                    <div class="detail-item">
                        <span class="detail-title">First Name:</span>
                        <span class="detail-info"><?php echo $user['firstName']; ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Last Name:</span>
                        <span class="detail-info"><?php echo $user['lastName']; ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Email:</span>
                        <span class="detail-info"><?php echo $user['email']; ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Phone Number:</span>
                        <span class="detail-info"><?php echo $user['phone_number']; ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Address:</span>
                        <span class="detail-info"><?php echo $user['address']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>
</body>
</html>
