<?php
session_start();
include '../../connect.php'; 

$sellerId = $_SESSION['user_id'];

// Initialize a variable for the popup status
$popupVisible = false; 

if (isset($_POST['create'])) {
    $discountName = $_POST['discountName'];
    $discountType = $_POST['discountType'];
    $discountValue = $_POST['discountValue'];
    $description = $_POST['description'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $status=$_POST['status'];


    $sql = "INSERT INTO discount (discount_id,sellerid, discountName, discountType, discountValue, description, startDay, endDay,status) 
            VALUES ('','$sellerId', '$discountName', '$discountType', '$discountValue', '$description', '$startDate', '$endDate','$status')";


    if ($conn->query($sql) === TRUE) {
        $popupVisible = true; 

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Discount</title>
    <link rel="stylesheet" href="assert/discountstyle.css">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        
</head>

<body>
    <?php include "../../header.php" ?>
    <br>
    <h1 class="pagetitle70">Create Discount</h1>

    <form class="emform" method="POST" action="">
        <input type="hidden" name="sellerId" value="1"> <!-- Example Seller ID -->
        
        
        <label class="formlable">Discount Name:</label><br>
        <input class="forminput" type="text" name="discountName" required><br>
        
        <label class="formlable">Discount Type:</label><br>
        <select class="formselec" name="discountType">
            <option value="percentage">Percentage</option>
            <option value="fixed">Fixed Amount</option>
        </select><br>

        <label class="formlable">Discount Value:</label><br>
        <input class="forminput" type="number" name="discountValue" required step="0.01"><br>

        <label class="formlable">Description:</label><br>
        <textarea class="forminput" type="text" name="description" placeholder="About the Discount"></textarea><br>

        <label class="formlable">Start Date:</label><br>
        <input class="forminput" type="date" name="startDate" required><br>

        <label class="formlable">End Date:</label><br>
        <input class="forminput" type="date" name="endDate" required><br>

        <label class="formlable">Status:</label><br>
        <select class="formselec" name="status">
            <option value="active">Active</option>
            <option value="disable">Disable</option>
        </select><br>
        <div class="captchasize">
            <div class="g-recaptcha" data-sitekey="6LeSxVkqAAAAAAT--oMWqYvtUlUaNC73z499G0cn" ></div>
        </div>

        <input class="submitbtn"type="submit" name="create" value="Create Discount">
    </form>
    
    <a class="viewbtn" href="discountRead.php">View Discounts</a>
    <?php include "../../footer.php" ?>

    <!-- Overlay for the popup -->
    <div class="overlay <?php if ($popupVisible) echo 'show-overlay'; ?>"></div>

    <!-- Popup that appears after form submission -->
    <div class="popup <?php if ($popupVisible) echo 'open-popup'; ?>" id="popup">
        <img class="popupimg" src="../../images/okmark.png">
        <h2 class="popuphead">Thank You!</h2>
        <p class="popuppara">Your discount has been successfully added. Thanks!</p>
        <button class="popupbtn" type="button" onclick="redirectHome()">OK</button>
    </div>

    <script>
        function redirectHome() {
            window.location.href = 'discountRead.php'; // Redirect to home page
        }
    </script>
</body>
</html>
