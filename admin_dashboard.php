<?php
session_start();
require_once 'connect.php'; 

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
}

$admin_id = $_SESSION['admin_id'];
$admin_query = "SELECT * FROM `Admin` WHERE admin_id='$admin_id'";
$admin_result = $conn->query($admin_query);
$admin = $admin_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php include "header.php"; ?>
    <div class="box1">
        <div class="box2">
            <div class="sidebar">
                <h2 class="naviTitle">Admin Dashboard</h2>

                <ul id="menu">
                    <h3>Manage Users</h3>
                    <p><a href="admin_dashboard/add_user.php">Add User</a></p>
                    <p><a href="admin_dashboard/view_users.php">View Users</a></p>
                    <h3>Manage Inquiries</h3>
                    <p><a href="admin_dashboard/adminInquiryRead.php">View Inquiries</a></p>
                </ul>    
            </div>

            <div class="main-content">
                <h3>Welcome <?php echo $admin['firstName']; ?></h3>
                <div class="user-details">
                    <div class="detail-item">
                        <span class="detail-title">Email:</span>
                        <span class="detail-info"><?php echo $admin['email']; ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Phone Number:</span>
                        <span class="detail-info"><?php echo $admin['phone_number']; ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-title">Address:</span>
                        <span class="detail-info"><?php echo $admin['address']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>