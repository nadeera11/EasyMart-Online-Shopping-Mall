<?php
session_start();
include 'connect.php';

$inquiry_id = $_POST['inquiry_id'];
$sql = "SELECT * FROM inquiry WHERE inquiry_id='$inquiry_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inquiry</title>
    <link rel="stylesheet" href="css/contact.css">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
</head>
<body>
    <?php include 'header.php' ?>
    <h2 class="pagetitle70">Update Inquiry Status</h2>
    <form method="POST" action="inquiryUpdateInsert.php" class="emform">
        <input type="hidden" name="inquiry_id" value="<?php echo $row['inquiry_id']; ?>">

        <label class="formlabel"for="status">Status:</label><br>
        <select class="formselec"name="status">
            <option value="new" <?php echo ($row['status'] == 'new' ? 'selected' : ''); ?>>New</option>
            <option value="pending" <?php echo ($row['status'] == 'pending' ? 'selected' : ''); ?>>Pending</option>
            <option value="resolved" <?php echo ($row['status'] == 'resolved' ? 'selected' : ''); ?>>Resolved</option>
        </select><br><br>

        <input type="submit" class="submitbtn" value="Update Status">
    </form><br>

    <a href="admin_dashboard/adminInquiryRead.php"class="viewbtn">Back to customer inquiries </a>
    <?php include 'footer.php' ?>
</body>
</html>
