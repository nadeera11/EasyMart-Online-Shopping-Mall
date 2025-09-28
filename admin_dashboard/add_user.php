<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_add_user.css">
    <title>Add User</title>
</head>
<body>
    <?php include "../header.php"?>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Add User</h2>
            <form action="insert_user.php" method="POST">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="account_type">Account Type:</label>
                <select id="account_type" name="account_type" required>
                    <option value="customer">Customer</option>
                    <option value="seller">Seller</option>
                </select>
                <br>
                <br>
                <input type="submit" value="Add User">
            </form>
            <a class="back-link" href="view_users.php">Back to View Users</a>
        </div>
        
    </div>

    <?php include "../footer.php"?>
</body>
</html>