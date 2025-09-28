<?php
require 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    if (!empty($email)) {
        $query = "SELECT * FROM inquiry WHERE email = '$email'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            $_SESSION['user_email'] = $email;
            header("Location: submittedInquiryRead.php");
            exit();

        } else {
            header("Location: submittedInquiryRead.php?error=Invalid Email.");
            exit();
        }
        
    } else {
        header("Location: inquiryEmail.php?error=Email is required.");
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Email</title>
    <link rel="stylesheet" href="css/contact.css">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
    
</head>
<body>
<?php include 'header.php' ?>
<br><br>
    <div class="emailform">
        <h1 class="pagetitle70">Enter Email Used in Your Inquiry</h1>
        <form method="POST" action="./submittedInquiryRead.php" class="emform">
            <label for="email" class="formlabel">Email:</label><br><br>
            <input type="email" id="email" name="email" class="forminput" placeholder="Enter your email" required><br><br>
            <input type="submit" value="Submit Email" class="submitbtn" name="submit">
        </form>
        <a class="viewbtn" href="inquiryCreate.php">Back to Contact</a>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
