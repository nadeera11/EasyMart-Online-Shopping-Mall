<?php
session_start();
require_once '../connect.php';


if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "DELETE FROM user WHERE user_id='$user_id'";

    if ($conn->query($sql) === TRUE) {

        header('Location: view_users.php?message=User deleted successfully');
        exit();
    } else {

        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "No user ID specified.";
}

$conn->close();
?>