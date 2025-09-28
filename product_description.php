<?php
session_start();
require_once 'connect.php'; 

$product_id = $_GET['id'];

$sql = "SELECT * FROM Product WHERE product_id = '$product_id'";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if (!$product) {
    echo "Product not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="css/product_description.css"> 
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="productBox">
        <div class="left">
            <img src="<?php echo 'seller_dashboard/uploads/' . $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
        </div>

        <div class="right">
            <h1><?php echo $product['name']; ?></h1>
            <p class="description"><?php echo $product['description']; ?></p>
            <p class="price">Price: LKR <?php echo $product['price']; ?></p>

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <a href="checkout.php?id=<?php echo $product['product_id']; ?>" class="buynowBtn">Buy Now</a>
            <?php else: ?>
                <a href="login.php" class="buynowBtn">Login to Buy</a>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>

<?php
$conn->close();
?>
