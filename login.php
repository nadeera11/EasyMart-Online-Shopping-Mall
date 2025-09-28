<?php
session_start();
require 'connect.php'; 

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $query = "SELECT user_id, firstName, lastName, password, account_type, email FROM User WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();
        
        if ($password === $user['password']) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['firstName'] = $user['firstName'];
            $_SESSION['lastName'] = $user['lastName'];
            $_SESSION['account_type'] = $user['account_type'];
            $_SESSION['email'] = $user['email'];

            // Redirect to index.php 
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid email or password. Please try again.";
        }
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
</head>
<body>
    <?php include 'header.php' ?>
    <div class="box1">
            <img src="images/login.jpg" class="image" alt="Team Image">
    </div>
    <div class="box2">
        <div class="login">
            <h2>Login</h2>
            
            <?php if (isset($_GET['message'])): ?>
                <p class="error"><?php echo $_GET['message']; ?></p>
            <?php endif; ?>

            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="POST" action="">
                <div>
                    <label for="email">Email: </label><br>
                    <input class="inputs" type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Password:</label><br>
                    <input class="inputs" type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="loginBtn">Login</button>
            </form>
            <p>Don't have an account? <a href="register.php">Register here</a></p>    
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
