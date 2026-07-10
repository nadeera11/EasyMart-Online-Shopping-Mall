<?php
// backend/register_backend.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../connect.php');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $account_type = $_POST['account_type'];

    // Check if the email already exists
    $check_email_sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = $conn->query($check_email_sql);

    if ($result && $result->num_rows > 0) {
        // Email already exists
        header("Location: ../register.php?show=Email already exists");
        exit();
    }

    // SQL query to insert user data
    $sql = "INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`, `phone_number`, `address`, `account_type`) 
            VALUES ('$first_name', '$last_name', '$email', '$password', '$phone_number', '$address', '$account_type')";

    if ($conn->query($sql)) {
        header("Location: ../register.php?show=Registration Successful"); // Redirect after successful registration
        exit(); // Make sure to exit after header redirection
    } else {
        exit("User registration unsuccessful: " . $conn->error); // Show error message if failed
    }
}
?>
