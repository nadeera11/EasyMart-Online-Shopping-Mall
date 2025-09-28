<?php
session_start();
require_once 'connect.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$product_id = $_GET['id'];

$sql = "SELECT * FROM Product WHERE product_id = '$product_id'";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

$orderSuccess = false; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['payment_method'];
    $quantity = $_POST['quantity']; 
    $totalPrice = $product['price'] * $quantity; 

    if (empty($firstName) || empty($lastName) || empty($address) || empty($paymentMethod) || empty($quantity)) {
        echo "Please fill in all fields.";
    } else {
        $name = $firstName . ' ' . $lastName;
        $user_id = $_SESSION['user_id'];
        $seller_id = $product['sellerid'];

        $sql_insert = "INSERT INTO `order` (user_id, sellerid, product_id, DATE, address, payment_method, price, status, image) 
                       VALUES ('$user_id', '$seller_id', '$product_id', CURDATE(), '$address', '$paymentMethod', '$totalPrice', 'pending', '$name')";
        
        if ($conn->query($sql_insert) === TRUE) {
            $orderSuccess = true; 
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now - <?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="css/buy.css">
    <link rel="stylesheet" href="css/checkout.css">
    <script>
        function updateTotalPrice() {
            const price = <?php echo $product['price']; ?>;
            const quantity = document.getElementById('quantity').value;
            const totalPrice = price * quantity;
            document.getElementById('totalPrice').innerText = 'LKR ' + totalPrice.toFixed(2);
        }

        function showOrderSuccess() {
            alert("Order placed successfully!");
        }
    </script>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="buy-now-container">
        <h2>Buy Now: <?php echo $product['name']; ?></h2>

        <form method="POST" action="">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName" required>

            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required>

            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="cash_on_delivery">Cash on Delivery</option>
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1" onchange="updateTotalPrice()" required>

            <p>Total Price: <span id="totalPrice">LKR <?php echo $product['price']; ?></span></p>
            
            <button type="submit">Place Order</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>

    <?php if ($orderSuccess): ?>
        <script>
            showOrderSuccess();
        </script>
    <?php endif; ?>
</body>
</html>

<?php
$conn->close();
?>
