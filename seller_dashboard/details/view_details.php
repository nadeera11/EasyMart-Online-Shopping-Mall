<?php
session_start();
require_once '../../connect.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user_query = "SELECT firstName, lastName, email, phone_number, address FROM `User` WHERE user_id='$user_id'";
$user_result = $conn->query($user_query);

if ($user_result && $user_result->num_rows > 0) {
    $user = $user_result->fetch_assoc();
} else {
    echo "<p>No user details found.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="../../css/viewdetails.css?v1.1">

</head>
<body>

    <div class="container">
        <h2>Your User Information</h2>

        <div class="user-info">
            <div class="user-card">
                <span>First Name:</span> <?php echo $user['firstName']; ?>
            </div>
            <div class="user-card">
                <span>Last Name:</span> <?php echo $user['lastName']; ?>
            </div>
            <div class="user-card">
                <span>Email:</span> <?php echo $user['email']; ?>
            </div>
            <div class="user-card">
                <span>Phone Number:</span> <?php echo $user['phone_number']; ?>
            </div>
            <div class="user-card">
                <span>Address:</span> <?php echo $user['address']; ?>
            </div>
        </div>

        <a href="../../seller_dashboard.php" class="backbtn">Back to Dashboard</a>
    </div>

</body>
</html>
