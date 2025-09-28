<?php
session_start();
require 'connect.php';

$email = '';
$inquiries = [];
$errorMessage = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $query = "SELECT * FROM inquiry WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $inquiries[] = $row;
        }
    } else {
        $errorMessage = "No inquiries found for this email.";
    }
} else {
    header("Location: inquiryEmail.php?error=Please enter your email.");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Inquiries</title>
    <link rel="stylesheet" href="css/contact.css">
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Racing Sans One' rel='stylesheet'>
</head>
<body>
<?php include 'header.php' ?>
<br><br>
<h2 class="pagetitle80">Your Inquiries</h2>

<?php if (!empty($errorMessage)): ?>
    <p><?php echo $errorMessage; ?></p>
<?php else: ?>
    <table class='table'>
        <tr class='tablerow'>
            <th class='tablehead'>ID</th>
            <th class='tablehead'>Name</th>
            <th class='tablehead'>Email</th>
            <th class='tablehead'>Description</th>
            <th class='tablehead'>Status</th>
            <th class='tablehead'>Date</th>
            <th class='tablehead'>Action</th>
        </tr>
        <?php foreach ($inquiries as $row): ?>
            <tr class='tablerow'>
                <td class='tabledata'><?php echo $row['inquiry_id']; ?></td>
                <td class='tabledata'><?php echo $row['name']; ?></td>
                <td class='tabledata'><?php echo $row['email']; ?></td>
                <td class='tabledata'><?php echo $row['description']; ?></td>
                <td class='tabledata'><?php echo $row['status']; ?></td>
                <td class='tabledata'><?php echo $row['DATE']; ?></td>
                <td class='tabledata'>
                    <form method='POST' action='inquiryDelete.php'>
                        <input type='hidden' name='inquiry_id' value='<?php echo $row['inquiry_id']; ?>'>
                        <input type='submit' value='Delete' class="actionbtn2">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a class="submitbtn" href="inquiryCreate.php">Back to Contact</a>
<?php endif; ?>
<?php include 'footer.php'; ?>
</body>
</html>