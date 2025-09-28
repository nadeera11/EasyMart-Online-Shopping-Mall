<?php 

require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inquiry_id = $_POST['inquiry_id'];
    $status = $_POST['status'];

    $sql = "UPDATE inquiry SET status='$status' WHERE inquiry_id='$inquiry_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Inquiry updated successfully.');
            window.location.href = 'admin_dashboard/adminInquiryRead.php';
            </script>";
    } else {
        echo "<script>alert('Error updating inquiry.');
            window.location.href = 'admin_dashboard/adminInquiryRead.php';
            </script>" . $conn->error;
    }
}
?>