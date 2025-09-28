<?php
   include '../connect.php';

   include_once '../header.php';
   $product_id = $_GET['product_id'];
   
   $query = "SELECT * FROM product WHERE product_id='$product_id'";
   $result = mysqli_query($conn, $query);
   $product = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <link rel="stylesheet" href="../css/products.css">
    <script src="../js/index.js"></script>
</head>
<body>
    
<div class="container">



    <div class="form-content">

    

    <form action="submit_update.php" method="POST" enctype="multipart/form-data" >

    <h4 class="title1">Update Products</h4><br> 

    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" class="box" placeholder="enter the product id"><br><br>

    <label for="name">Product Name:</label>
    <input type="text" name="name"  id="name" value="<?php echo $product['name']; ?> " class="box" placeholder="enter the product name" required><br><br>

    
    <label for="price">Product Price:</label>
    <input type="text" name="price" id="price"  class="box"  value="<?php echo $product['price']; ?>" placeholder="enter the product price" required><br><br>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity"  class="box" value="<?php echo $product['quantity']; ?>" placeholder="enter the quantity of product" required><br><br>

    <label for="image">Product Image:</label>
    <input type="file" name="image" id="image"class="box"  ><br><br>

    <label for="description">Description:</label><br>
    <textarea name="description" id="description"  rows="10" cols="40" id="des-box" <?php echo $product['description']; ?> placeholder="enter the description of product" required></textarea><br><br>

    <input type="checkbox" class="inputStyle" id="check" onclick="enableButton()">Accept Privacy Policy and Terms<br/><br/>

    <input type="submit" value="update" name="update_product" class="btn1" id="sbtn" disabled><br>

    <a href="../seller_dashboard.php" class="btn1">Go back</a>
</form>

    </div>

</div>


</body>
</html>

<?php
        include_once '../footer.php'
        ?>
