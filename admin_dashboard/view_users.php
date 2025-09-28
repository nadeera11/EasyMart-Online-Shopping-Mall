<?php
session_start();
require_once '../connect.php';  // Include the database connection

// Check if the user is logged in as admin
if (!isset($_SESSION['loggedin']) || $_SESSION['account_type'] !== 'admin') {
    header('Location: ../admin_login.php');  
    exit();
}

// Fetch users from the database
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

// Message handling
$message = '';
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Users</title>
    <link rel="stylesheet" href="../css/admin_view_users.css"> 
</head>
<body>
    <?php include "../header.php" ?>

    <h2 class="table-title">Admin Dashboard - View Users</h2>
    
    <?php if ($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Account Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($user = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['firstName']; ?></td>
                        <td><?php echo $user['lastName']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['phone_number']; ?></td>
                        <td><?php echo $user['address']; ?></td>
                        <td><?php echo $user['account_type']; ?></td>
                        <td class="actions">
                            <a href="edit_user.php?user_id=<?php echo $user['user_id']; ?>">Update</a>
                            <a href="delete_user.php?user_id=<?php echo $user['user_id']; ?>" onclick="return confirmDelete();">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php include "../footer.php" ?>
    <script src="../js/admin_delete_user.js"></script>
</body>
</html>

<?php
$conn->close();
?>
