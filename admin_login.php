<?php
session_start();
require_once 'connect.php'; 

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_id = $_POST['admin_id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE admin_id='$admin_id' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        
        $_SESSION['loggedin'] = true;
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['admin_firstName'] = $admin['firstName'];
        $_SESSION['account_type'] = $admin['account_type'];

        
        header("Location: index.php");
    
    } else {
        $error_message = "Invalid admin ID or password.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/admin_login.css">
<body>

    <?php
    if (!empty($error_message)) {
        echo '<p style="color:red;">' . $error_message . '</p>';
    }
    ?>

    <form method="POST" action="">
        <label for="admin_id">Admin ID:</label>
        <input type="text" name="admin_id" id="admin_id" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
