<?php
session_start();
require_once '../connect.php';  // Include the database connection

$admin_id = $_POST['admin_id'];
$password = $_POST['password'];


// Query to check if admin ID and password match
$sql = "SELECT * FROM admin WHERE admin_id='$admin_id' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// Fetch admin details
	$admin = $result->fetch_assoc();

	// Store admin details in session
	$_SESSION['loggedin'] = true;
	$_SESSION['admin_id'] = $admin['admin_id'];
	$_SESSION['admin_firstNname'] = $admin['firstName'];
	$_SESSION['account_type'] = $admin['account_type'];

	// Redirect to the admin dashboard on successful login
	header("Location: ../index.php");
	exit();  // Always exit after a header redirect
} else {
	// Redirect back to login page with error message
	$error_message = "Invalid admin ID or password";
}

// Close the database connection
$conn->close();
?>