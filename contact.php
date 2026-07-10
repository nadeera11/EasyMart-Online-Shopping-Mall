<?php
require 'connect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the inquiry details from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    // Insert inquiry into the database
    $query = "INSERT INTO Inquiry (name, email, description) VALUES ('$name', '$email', '$description')";
    $conn->query($query); // No need to check for success
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css?v=1.1">
</head>
<body>
    <?php include "header.php" ?>
    <div class="contact-container">
        <h2>Contact Us</h2>
        
        <form method="POST" action="" id="inquiryForm">
            <div>
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="description">Your Inquiry:</label>
                <textarea id="description" name="description" rows="5" required></textarea>
            </div>
            <button type="submit">Submit Inquiry</button>
        </form>
        <p>Back to <a href="index.php">Home</a></p>
    </div>
    <?php include "footer.php" ?>
    <script src="js/contact.js"></script>
</body>
</html>
