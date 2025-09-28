<?php
session_start();
include '../connect.php';

$sql = "SELECT * FROM inquiry";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Inquiries</title>
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="icon" type="image/x-icon" href="easyMartLogo/Titlelogo.png">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
</head>
<body>
    <?php include '../header.php' ?>
    <br><br>
    <h2 class="pagetitle80">Manage Inquiries</h2><br>
    <table class="table">
        <tr>
            <th class="tablehead">ID</th>
            <th class="tablehead">Name</th>
            <th class="tablehead">Email</th>
            <th class="tablehead">Description</th>
            <th class="tablehead">Status</th>
            <th class="tablehead">Date</th>
            <th class="tablehead">Action</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr class ='tablerow'>
                        <td class='tabledata'>" . $row["inquiry_id"] . "</td>
                        <td class='tabledata'>" . $row["name"] . "</td>
                        <td class='tabledata'>" . $row["email"] . "</td>
                        <td class='tabledata'>" . $row["description"] . "</td>
                        <td class='tabledata'>" . $row["status"] . "</td>
                        <td class='tabledata'>" . $row["DATE"] . "</td>
                        <td class='tabledata'>
                            <form method='POST' action='../inquiryUpdate.php'>
                                <input type='hidden' name='inquiry_id' value='" . $row['inquiry_id'] . "'>
                                <input type='submit' value='Update Status'class='actionbtn1'>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No inquiries found.</td></tr>";
        }
        ?>
    </table>
    <a class="viewbtn" href="../inquiryCreate.php">Visit Contact Us Page</a>
    <br>
    <?php include '../footer.php' ?>
</body>
</html>