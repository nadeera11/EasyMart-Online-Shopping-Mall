<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $date = date("Y-m-d H:i:s");
    $status = "new";

    $sql = "INSERT INTO inquiry (name, email, description, DATE, status) 
            VALUES ('$name', '$email', '$description', '$date', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo"<script>
                alert('New inquiry created successfully.');
                window.location.href = 'inquiryCreate.php';
            </script>";
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }
}

?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fleetItems = document.querySelectorAll('.submitbtn');
        
        fleetItems.forEach(item => {
            
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'scaleX(1.05)';
                this.style.transition = 'transform 0.3s ease-in-out';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'scaleX(1)';
            });
        });
    });
</script>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - EasyMart.lk</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="icon" type="image/x-icon" href="easyMartLogo/Titlelogo.png">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
</head>
<body class="body">
    <?php include 'header.php' ?>
    <h1 class="heading" >Contact Us</h1><br>
    <div>
        <h3 class="title">How Can We Help?</h3>
        <p class="helptxt">We are here to assist you with any inquiries, concerns, or feedback you may have. Whether you need help navigating our products, have questions about your order, or wish to share your experience, feel free to reach out to us. Our support team is dedicated to ensuring a seamless shopping experience and will respond to your inquiry as soon as possible. Simply fill out the form below with your details, and we’ll take it from there. We look forward to assisting you!
        </p><br><br>
    </div>
    <h3 class="title">Do you have any issue place your inquiry</h3>
    <h2 class="pagetitle70">Create New Inquiry</h2>
    <form class="emform" method="POST" action="">
        <label class="formlabel" for="name">Name:</label><br><br>
        <input class="forminput" type="text" id="name" name="name" required><br><br>

        <label class="formlabel" for="email">Email:</label><br><br>
        <input class="forminput" type="email" id="email" name="email" required><br><br>

        <label class="formlabel" for="description">Description:</label><br><br>
        <textarea class="forminput" id="description" name="description" required></textarea><br><br>

        <input class="submitbtn" type="submit" value="Submit">
    
    </form>

    <a class="viewbtn" href="inquiryEmail.php">View Inquiry</a>
    
    <div class="contactinfo">
            <h3 class="title">Our Main Branch</h3>
            <p class="helptxt"><strong>Address:</strong> 123 Easy Mart Street, Colombo, Sri Lanka</p>
            <p class="helptxt"><strong>Phone:</strong> +94 123 456 789</p>
            <p class="helptxt"><strong>Email:</strong> support@easymart.lk</p>
    </div><br><br>

    <div class="mapsection">
            <h3 class="title">Find Us Here</h3>
            <div class="mapdiv">
                <iframe class="map1"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798467128197!2d79.97036957350727!3d6.914682818496999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1728305269618!5m2!1sen!2slk"
                 allowfullscreen="" loading="lazy"></iframe>
            </div>
    </div>
    <script src="js/contact.js"></script>
    <?php include 'footer.php' ?>
</body>
</html>