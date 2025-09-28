<?php

session_start(); 

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('connect.php');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $account_type = $_POST['account_type'];

    $check_email_sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = $conn->query($check_email_sql);

    if ($result && $result->num_rows > 0) {
        $error_message = "Email already exists.";
    } else {

        $sql = "INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`, `phone_number`, `address`, `account_type`) 
                VALUES ('$first_name', '$last_name', '$email', '$password', '$phone_number', '$address', '$account_type')";

        if ($conn->query($sql)) {
            header("Location: register.php?show=Registration Successful"); 
            exit(); 
        } else {
            $error_message = "User registration unsuccessful: " . $conn->error; 
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
      
        <div class="box1">
            <div class="image">
                <img src="images/register.jpg" alt="Registration Image" style="max-width: 80%; height: auto;">
            </div>
        </div>

        <div class="box2">
            <div class="register">
                <h2>Register</h2>
                
                <?php if (!empty($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php elseif (isset($_GET['show'])): ?>
                    <p style="color: green;"><?php echo $_GET['show']; ?></p>
                <?php endif; ?>

                <form id="registrationForm" action="" method="POST">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" required>

                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="phone_number">Phone Number:</label>
                    <input type="text" name="phone_number" required>

                    <label for="address">Address:</label>
                    <input type="text" name="address" required>

                    <label for="account_type">Account Type:</label>
                    <select name="account_type" required>
                        <option value="customer">Customer</option>
                        <option value="seller">Seller</option>
                    </select>

                    <button type="submit">Register</button>
                </form>

                <p>Already have an account? <a href="login.php">Login here</a>.</p>
            </div>
        </div>
    </div>
</body>
</html>