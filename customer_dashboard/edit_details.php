<?php
session_start();
require_once '../connect.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$user_query = "SELECT firstName, lastName, email, phone_number, address, password FROM `User` WHERE user_id = '$user_id'";
$user_result = $conn->query($user_query);
$user = $user_result->fetch_assoc();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $password = $_POST['password'];  

    $update_query = "UPDATE `User` 
                     SET firstName = '$firstName', lastName = '$lastName', email = '$email', phone_number = '$phone_number', address = '$address', password = '$password'
                     WHERE user_id = '$user_id'";
    
    if ($conn->query($update_query)) {
        echo "<p>User details updated successfully!</p>";
        header('Location: view_details.php');
        exit();
    } else {
        echo "<p>Error updating user details: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Details</title>
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
    <link rel="stylesheet" href="customer_dashboard.css"> 
    <link rel="stylesheet" href="../css/customer_edit_details.css">
    <script src="../js/user_edit_details.js"></script>
</head>
<body>

<div class="container">
    <h2>Edit Your User Information</h2>

    <div class="form-container">
        <form action="" method="POST">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" value="<?php echo $user['firstName']; ?>" required>

            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" value="<?php echo $user['lastName']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo $user['phone_number']; ?>" required>

            <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo $user['address']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $user['password']; ?>" required>

            <input type="submit" value="Update Details">
        </form>

        <a class="back-link" href="view_details.php">Back to User Details</a>
    </div>
</div>

</body>
</html>
