<?php
session_start();
require_once '../connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $account_type = $_POST['account_type'];

    $sql = "INSERT INTO user (firstName, lastName, email, password, phone_number, address, account_type) 
            VALUES ('$first_name', '$last_name', '$email', '$password', '$phone_number', '$address', '$account_type')";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_users.php?message=User added successfully");
    } else {
        header("Location: add_users.php?message=Error adding user: " . $conn->error);
    }
}

$conn->close();
?>
