<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Inquiry</title>
</head>
<body>
    <?php
        session_start();
        include 'connect.php';


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inquiry_id = $_POST['inquiry_id'];
            $sql = "DELETE FROM inquiry WHERE inquiry_id='$inquiry_id'";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Inquiry deleted successfully.');
                    window.location.href = 'submittedInquiryRead.php';
                    </script>";

            } else {
                echo "<script>alert('Error Deleting Inquiry.');
                    window.location.href = 'submittedInquiryRead.php';
                    </script>" . $conn->error;
                    
            }
        }

        $sql = "SELECT * FROM inquiry";
        $result = $conn->query($sql);

    ?>
    <?php include 'footer.php' ?>
</body>
</html>
