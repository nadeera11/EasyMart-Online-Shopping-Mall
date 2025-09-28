<?php
include '../../connect.php'; // Include database connection file

// Handle Delete
if (isset($_GET['id'])) {
    $discountId = $_GET['id'];
    $sql = "DELETE FROM discount WHERE discount_id='$discountId'";

    if ($conn->query($sql) === TRUE) {
        echo "Discount deleted successfully";
        header("Location: discountRead.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: discountRead.php");
}
?>
