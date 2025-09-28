<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyMart.lk Discover the Best Products</title>
    <link rel="stylesheet" href="http://localhost/easymart/css/header.css?v1.1">
    <link rel="icon" type="image/x-icon" href="easyMartLogo/Titlelogo.png?v1.1">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
</head>
<body>
    <nav class="navbar">
    <a href="http://localhost/easymart/index.php">
    <img src="http://localhost/easymart/easyMartLogo/EasyMartLogo.png" class="logo" alt="logo-image">
    </a>
        <div class="div1">
            <p class="name">EasyMart.lk</p>
            <ul class="nav-links">
                <li><a href="http://localhost/easymart/index.php" >Home</a></li>
                <li><a href="http://localhost/easymart/shop.php" >Shop</a></li>
                <li><a href="http://localhost/easymart/faq.php" >FAQ</a></li>
                <li><a href="http://localhost/easymart/about.php" >About Us</a></li>
                <li><a href="http://localhost/easymart/inquiryCreate.php" >Contact</a></li>
            </ul>
        </div>
        <div class="div2">
            <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    
                    if ($_SESSION['account_type'] == 'customer') {
                        echo '<a href="http://localhost/easymart/customer_dashboard.php">Customer Dashboard</a>';
                    } else if ($_SESSION['account_type'] == 'seller') {
                        echo '<a href="http://localhost/easymart/seller_dashboard.php">Seller Dashboard</a>';
                    } else if ($_SESSION['account_type'] == 'admin') {
                        echo '<a href="http://localhost/easymart/admin_dashboard.php">Admin Dashboard</a>';
                    }
                    echo '<a href="http://localhost/easymart/logout.php">Logout</a>';
                } else {
                    
                    echo '<a href="register.php">Register</a>';
                    echo '<a href="login.php">Sign In</a>';
                }
            ?>
        </div>
    </nav>
</body>
</html>
