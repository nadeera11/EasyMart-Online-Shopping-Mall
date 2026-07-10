<?php
// Assume you have already established a connection
session_start();
require 'connect.php'; // Your database connection file

// Get the user ID (you would typically get this from the session)
$user_id = $_SESSION['user_id']; // Assuming the user is logged in and user_id is stored in the session

// Query to select order details
$query = "SELECT order_id, product_id, order_date, status, price FROM `order` WHERE user_id = '$user_id'";

// Execute the query
$result = $conn->query($query);

// Check if the query was successful and if it returned any rows
if ($result && $result->num_rows > 0) {
    // Loop through and fetch all the rows
    while ($row = $result->fetch_assoc()) {
        echo "<p>Order ID: " . $row['order_id'] . "</p>";
        echo "<p>Product ID: " . $row['product_id'] . "</p>";
        echo "<p>Order Date: " . $row['order_date'] . "</p>";
        echo "<p>Status: " . $row['status'] . "</p>";
        echo "<p>Price: $" . $row['price'] . "</p>";
        echo "<hr>"; // Divider for multiple orders
    }
} else {
    echo "<p>No orders found for this user.</p>";
}
?>
