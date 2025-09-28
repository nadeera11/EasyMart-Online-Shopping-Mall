<?php
session_start();
require '../connect.php'; // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch orders for the logged-in user
$orders_query = "SELECT order_id, product_id, DATE, address, payment_method, price, status 
                 FROM `Order` WHERE user_id = '$user_id'";
$orders_result = $conn->query($orders_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" href="../css/customer_view_orders.css">
</head>
<body>
    <?php include "../header.php"; ?>
    <div class="page">
        <?php
        // Fetch and display user details directly
        $user_query = "SELECT firstName, lastName, email FROM `User` WHERE user_id = '$user_id'";
        $user_result = $conn->query($user_query);
        $user = $user_result->fetch_assoc();
        echo "<p>Name: " . $user['firstName'] . " " . $user['lastName'] . "</p>";
        echo "<p>Email: " . $user['email'] . "</p>";
        ?>
        <h2 class="table-title">Your Orders</h2>

        <?php if ($orders_result && $orders_result->num_rows > 0): ?>
            <table>
                    <tr>
                        <th>Image</th>
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Payment Method</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                        <?php while ($order = $orders_result->fetch_assoc()): ?>
                        <?php

                        // Fetch the product image using the product_id
                        $product_id = $order['product_id'];
                        $product_query = "SELECT image FROM `Product` WHERE product_id = '$product_id'";
                        $product_result = $conn->query($product_query);
                        $product = $product_result->fetch_assoc();
                        ?>
                        <tr>
                            <td>
                                <!-- Display the product image -->
                                <img src="<?php echo '../seller_dashboard/uploads/'. $product['image']; ?>">
                            </td>
                            <td><?php echo $order['order_id']; ?></td>
                            <td><?php echo $order['product_id']; ?></td>
                            <td><?php echo $order['DATE']; ?></td>
                            <td><?php echo $order['address']; ?></td>
                            <td><?php echo $order['payment_method']; ?></td>
                            <td><?php echo $order['price']; ?></td>
                            <td><?php echo $order['status']; ?></td>
                        </tr>
                    <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
        
        <p><a href="../customer_dashboard.php" class="backbtn">Back to Dashboard</a></p>
        <p class="address"><a href="edit_details.php" class="backbtn">Change Shipping Address</a></p>
    </div>
    <?php include "../footer.php"; ?>
</body>    
</html>