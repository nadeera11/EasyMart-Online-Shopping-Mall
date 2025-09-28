<?php
include '../../connect.php'; // Include database connection file

// Handle Update
if (isset($_POST['update'])) {
    $discountId = $_POST['discountId'];
    $sellerId = $_POST['sellerId'];
    $discountName = $_POST['discountName'];
    $discountType = $_POST['discountType'];
    $discountValue = $_POST['discountValue'];
    $description = $_POST['Description'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $status=$_POST['status'];

    $sql = "UPDATE discount SET sellerid='$sellerId', discountName='$discountName', discountType='$discountType', 
            DiscountValue='$discountValue', description='$description', startday='$startDate', endDay='$endDate',status ='$status'
            WHERE discount_id='$discountId'";

    if ($conn->query($sql) === TRUE) {
        echo "Discount updated successfully";
        header("Location: discountRead.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get discount data for editing
if (isset($_GET['id'])) {
    $discountId = $_GET['id'];
    $result = $conn->query("SELECT * FROM discount WHERE discount_id='$discountId'");
    $discount = $result->fetch_assoc();
} else {
    header("Location: discountRead.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Discount</title>
    <link rel="stylesheet" href="assert/discountstyle.css">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
</head>
<body>
    <?php include '../../header.php' ?>
    <br>

    <h1 class="pagetitle70">Update Discount</h1>
    <form class="emform" method="POST" action="">
        <input type="hidden" name="discountId" value="<?php echo $discount['discount_id']; ?>">

        <input type="hidden" name="sellerId" value="<?php echo $discount['sellerid']; ?>">
         
        <label class="formlable">Discount Name:</label><br>
        <input class="forminput" type="text" name="discountName" value="<?php echo $discount['discountName']; ?>" required><br>
        
        <label class="formlable">Discount Type:</label><br>
        <select class="formselec" name="discountType">
            <option value="percentage" <?php echo $discount['discountType'] == 'percentage' ? 'selected' : ''; ?>>Percentage</option>
            <option value="fixed" <?php echo $discount['discountType'] == 'fixed' ? 'selected' : ''; ?>>Fixed Amount</option>
        </select><br>

        <label class="formlable">Discount Value:</label><br>
        <input class="forminput" type="number" name="discountValue" value="<?php echo $discount['discountValue']; ?>" required step="0.01"><br>

        <label class="formlable">Description:</label><br>
        <textarea class="forminput" name="Description"> <?php echo $discount['description']; ?></textarea><br>

        <label class="formlable">Start Date:</label><br>
        <input class="forminput" type="date" name="startDate" value="<?php echo $discount['startDay']; ?>" required><br>

        <label class="formlable">End Date:</label><br>
        <input class="forminput" type="date" name="endDate" value="<?php echo $discount['endDay']; ?>" required><br>

        <label class="formlable">Status:</label><br>
        <select class="formselec" name="status">
            <option value="active" <?php echo $discount['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
            <option value="disable" <?php echo $discount['status'] == 'disable' ? 'selected' : ''; ?>>Disable</option>
        </select><br>

        <input class="submitbtn" type="submit" name="update" value="Update Discount">
    </form>
    <a class="viewbtn" href="discountRead.php">Back to Discounts</a>
    <?php include '../../footer.php' ?>
</body>
</html>
