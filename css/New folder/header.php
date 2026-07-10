<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyMart.lk Discover the Best Products</title>
    <link rel="stylesheet" href="css/header.css?v1.1">
    <link rel="icon" type="image/x-icon" href="images/Titlelogo.png">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
</head>
<body>
    <nav class="navbar">
        <img src="easyMartLogo/EasyMartLogo.png" class="logo" alt="logo-image">
        <div class="div1">
            <p class="name">EasyMart.lk</p>
            <ul class="nav-links">
                <li><a href="index.php" >Home</a></li>
                <li><a href="shop.php" >Shop</a></li>
                <li><a href="#" >Categories</a></li>
                <li><a href="#" >FAQ</a></li>
                <li><a href="#" >About Us</a></li>
                <li><a href="contact.php" >Contact</a></li>
            </ul>
        </div>
        <div class="div2">
            <?php
                // Start session if not already started
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                // Check if user is logged in
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    // Display appropriate Dashboard buttons based on account type
                    if ($_SESSION['account_type'] == 'customer') {
                        echo '<a href="customer_dashboard.php">Customer Dashboard</a>';
                    } else if ($_SESSION['account_type'] == 'seller') {
                        echo '<a href="seller_dashboard.php">Seller Dashboard</a>';
                    } else if ($_SESSION['account_type'] == 'admin') {
                        echo '<a href="admin_dashboard.php">Admin Dashboard</a>';
                    }
                    echo '<a href="logout.php">Logout</a>';
                } else {
                    // Display Register and Sign In buttons when not logged in
                    echo '<a href="register.php">Register</a>';
                    echo '<a href="login.php">Sign In</a>';
                }
            ?>
        </div>
    </nav>
</body>
</html>
