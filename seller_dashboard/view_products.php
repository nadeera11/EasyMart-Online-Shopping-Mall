<?php
include '../connect.php';

session_start();
$sellerid = $_SESSION['user_id'];

include_once '../header.php';



$sql = "SELECT * FROM product WHERE sellerid='$sellerid'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="../css/products.css">
</head>
<body>

<div class="product-display"> 




<h1 class="title2">Product List</h1>
    
    <br><br>
    <table class="product-table">
        <tr >
        <th class="col1">Product id</th>
            <th class="col1">Product Name</th>
            <th class="col1">Price</th>
            <th class="col1">Quantity</th>
            <th class="col1">Description</th>
            <th class="col1">Image</th>
            <th class="col1">Update</th>
            <th class="col1">Delete</th>
            
        </tr>

        

        

        
        <?php
        if ($result->num_rows > 0) {
           
            while($row = $result->fetch_assoc()) {
                
                echo "<tr>";
            echo "<td class='row'>" . $row['product_id'] . "</td>";
            echo "<td class='row'>" . $row['name'] . "</td>";
            echo "<td class='row'>" . $row['price'] . "</td>";
            echo "<td class='row'>" . $row['quantity'] . "</td>";
            echo "<td class='row'>" . $row['description'] . "</td>";
            echo "<td class='row'><img src='uploads/" . $row['image'] . "' width='100px'></td>";
            echo "<td class='row-box'><a href='update_product.php?product_id=" . $row['product_id'] . "'><button id='upd-btn'>Update</a></td>";
            echo "<td class='row-box'><a href='deleteproducts.php?product_id=" . $row['product_id'] . "' onclick='return confirm(\"Are you sure you want to delete this product?\")'><button id='del-btn'>Delete</a></td>";
            echo "</tr>";
                   
                    
                    
             
            }
        } else {
            echo "<tr><td colspan='4'>No products found</td></tr>";
        }
        ?>
        
       



    </table>
<div class=btncontent >
    <a class="addbtn" href="add_product.php" id="a-tag">Add New Product</a>
    <a class="addbtn" href="../seller_dashboard.php" id="a-tag">View Dashboard</a>






<?php
$conn->close();
?>
</div>

</body>
</html>
<?php
        include_once '../footer.php';
?>