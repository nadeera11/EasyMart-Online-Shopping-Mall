<?php
session_start();
include '../../connect.php';

$sellerId = $_SESSION['user_id'];
$discount = $conn->query("SELECT * FROM discount WHERE sellerid = $sellerId");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Discounts</title>
    <link rel="stylesheet" href="assert/discountstyle.css">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>

    <script>
        // Confirmation prompt for delete button
        function confirmDelete() {
            return confirm("Are you sure you want to delete this discount?");
        }
    </script>
</head>
<body>
    <?php include '../../header.php'?>
    <?php

    ?>
    <br>
    <h1 class="pagetitle80">Existing Discounts</h1>

    <table class="table" border="1">
        <tr class="tablerow">
            <th class="tablehead">ID</th>
            <th class="tablehead">Seller ID</th>
            <th class="tablehead">Name</th>
            <th class="tablehead">Type</th>
            <th class="tablehead">Value</th>
            <th class="tablehead">Description</th>
            <th class="tablehead">Start Date</th>
            <th class="tablehead">End Date</th>
            <th class="tablehead">Status</th>
            <th class="tablehead">Actions</th>
        </tr>

        <?php while ($row = $discount->fetch_assoc()) { ?>

            <tr class="tablerow">
                <td class="tabledata"><?php echo $row['discount_id']; ?></td>
                <td class="tabledata"><?php echo $row['sellerid']; ?></td>
                <td class="tabledata"><?php echo $row['discountName']; ?></td>
                <td class="tabledata"><?php echo $row['discountType']; ?></td>
                <td class="tabledata"><?php echo $row['discountValue']; ?></td>
                <td class="tabledata"><?php echo $row['description']; ?></td>
                <td class="tabledata"><?php echo $row['startDay']; ?></td>
                <td class="tabledata"><?php echo $row['endDay']; ?></td>
                <td class="tabledata"><?php echo $row['status']; ?></td>
                <td class="tabledata">
                    <a class="actionbtn1" href="discountUpdate.php?id=<?php echo $row['discount_id']; ?>">Update</a>
                    <a class="actionbtn2" href="discountDelete.php?id=<?php echo $row['discount_id']; ?>" onclick="return confirmDelete()">Delete</a>
                </td>
            </tr>

        <?php } ?>
    </table>

    <a class="createbtn" href="discountCreate.php">Create New Discount</a>
    <?php include '../../footer.php'?>
</body>
</html>
