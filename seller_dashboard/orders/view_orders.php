<?php
session_start();
require_once '../../connect.php'; // Include your database connection file

// Check if the user is logged in as seller
if (!isset($_SESSION['loggedin']) || $_SESSION['account_type'] !== 'seller') {
    header('Location: ../../login.php');
    exit();
}

// Fetch orders received by the logged-in seller
$seller_id = $_SESSION['user_id']; 

// Make sure to check if seller_id is being set correctly
if (!isset($seller_id)) {
    die('Seller ID not found in session.');
}

$sql = "SELECT * FROM `Order` WHERE sellerid='$seller_id'"; // Ensure seller_id exists in the Order table
$result = $conn->query($sql);

// Error handling for the SQL query
if ($result === false) {
    die('Error executing query: ' . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/tables.css">
    <title>Orders Received</title>
</head>
<body>
    <?php include "../../header.php" ?>

    <div class="page">
        <h2 class="table-title">Orders Received</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Order Date</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th> 
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($order = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['user_id']; ?></td>
                        <td><?php echo $order['product_id']; ?></td>
                        <td><?php echo $order['DATE']; ?></td>
                        <td><?php echo $order['address']; ?></td>
                        <td><?php echo $order['payment_method']; ?></td>
                        <td><?php echo $order['price']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                        <td class="actions">
                            <a href="update_order.php?order_id=<?php echo $order['order_id']; ?>">Update</a>  
                            <form action="delete_order.php" method="POST" style="display:inline;">
                                <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                <input type="submit" value="Delete" class="backbtn" onclick="return confirm('Are you sure you want to delete this order?');">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No orders received.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <?php include "../../footer.php" ?>
</body>
</html>

<?php
$conn->close();
?>