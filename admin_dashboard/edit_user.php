<?php
session_start();
require_once '../connect.php';

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = $conn->query($sql);

$user = $result->fetch_assoc();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $account_type = $_POST['account_type'];

    $update_sql = "UPDATE user SET firstName = '$first_name', lastName = '$last_name', email = '$email', phone_number = '$phone_number', address = '$address', account_type = '$account_type' 
                   WHERE user_id = '$user_id'";

    $conn->query($update_sql);
   
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../css/admin_edit_user.css">
    <script src="../js/admin_edit_user.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Edit User</h2>

            <?php if (isset($_GET['show'])): ?>
                <p style="color: red;"><?php echo $_GET['show']; ?></p>
            <?php endif; ?>

            <form action="" method="POST">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" value="<?php echo $user['firstName']; ?>" required>

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $user['lastName']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" value="<?php echo $user['phone_number']; ?>" required>

                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $user['address']; ?>" required>

                <label for="account_type">Account Type:</label>
                <select name="account_type" required>
                    <option value="customer" <?php if ($user['account_type'] == 'customer') echo 'selected'; ?>>Customer</option>
                    <option value="seller" <?php if ($user['account_type'] == 'seller') echo 'selected'; ?>>Seller</option>
                </select>
                <br>
                <br>
                <input type="submit" value="Update User Details">
            </form>

            <a href="view_users.php" class="back-link">Back to View Users</a>
        </div>
    </div>
</body>
</html>