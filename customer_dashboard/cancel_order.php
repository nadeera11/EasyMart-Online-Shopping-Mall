<?php
session_start();
require_once '../connect.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];

    $delete_sql = "DELETE FROM `Order` WHERE order_id='$order_id'";

    $conn->query($delete_sql);
        
  
}

$user_id = $_SESSION['user_id'];
$orders_query = "SELECT order_id, product_id, DATE, price FROM `Order` WHERE user_id='$user_id'";
$orders_result = $conn->query($orders_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Order</title>
    <link rel="stylesheet" href="../css/cancle_order.css"> 
    <script src="../js/user_cancel_order.js" defer></script>
</head>
<body>

<div class="box1">
    <h2>Cancel Order</h2>

    <?php
    if ($message) {
        echo "<script>checkMessage('$message');</script>"; 
        echo "<p>$message</p>"; 
    }
    ?>

    <form method="POST" action="cancel_order.php">
        <label for="order_id">Select Order to cancel:</label>
        <select name="order_id" id="order_id" required>
            <option value="">Select an order</option>
            <?php
            
            if ($orders_result && $orders_result->num_rows > 0) {
                while ($order = $orders_result->fetch_assoc()) {
                    echo "<option value='" . $order['order_id'] . "'>Order #" . $order['order_id'] . " | Product: " . $order['product_id'] . " | Price: $" . $order['price'] . " | Date: " . $order['DATE'] . "</option>";
                }
            } else {
                echo "<option value=''>No orders found</option>";
            }
            ?>
        </select>
        <br><br>
        <button type="submit">Cancel Order</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
