<?php
session_start();
require 'connect.php'; // Include your database connection file

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php");
    exit();
}

// Get user ID and email from session
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
    
</head>
<body>
    <?php include "header.php" ?>
    <div class="box1">
        <div class="box2">
            <div class="sidebar">
                <h2 class="naviTitle">Customer Dashboard</h2>

                <ul id="menu">
                    <h3 class="title">My Orders</h3>
                    <p><a href="customer_dashboard/view_orders.php">View Orders</a></p>
                    <p><a href="customer_dashboard/cancel_order.php">Cancel Orders</a></p>

                    <h3 class="title">My Detials</h3>
                    <p><a href="customer_dashboard/view_details.php">View Details</a></p>
                    <p><a href="customer_dashboard/edit_details.php">Edit Details</a></p>
                </ul>    
            </div>

            <div class="main-content">
                <h3 class="details_Title">Welcome !</h3>
                    <div id="details">
                        <?php
                        $user_query = "SELECT firstName, lastName, email FROM `User` WHERE user_id = '$user_id'";
                        $user_result = $conn->query($user_query);
                        $user = $user_result->fetch_assoc();
                        echo "<p>Name: " . $user['firstName'] . " " . $user['lastName'] . "</p>";
                        echo "<p>Email: " . $user['email'] . "</p>";
                        ?>
                    </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>
