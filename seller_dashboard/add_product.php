<?php
        include_once '../header.php'
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

    <form action="insert_product.php" method="post" enctype="multipart/form-data">

    <h4 class="title1">Add Products</h4><br>
 

    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" class="box" placeholder="enter the product name" required><br><br>

    
    <label for="price">Product Price:</label>
    <input type="text" name="price" id="price" class="box" placeholder="enter the product price" required><br><br>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" class="box" placeholder="enter the quantity of product" required><br><br>

    <label for="image">Product Image:</label>
    <input type="file" name="image" id="image"class="box" required><br><br>

    <label for="description">Description:</label><br>
    <textarea name="description" id="description" rows="10" cols="40"  placeholder="enter the description of product" required></textarea><br><br>

    <input type="checkbox" class="inputStyle" id="check" onclick="enableButton()">Accept Privacy Policy and Terms<br/><br/>

    <input type="submit" value="Add Product" name="add_product" class="btn1" id="sbtn" disabled><br>

    <a href="../seller_dashboard.php" class="btn1">Go back</a>
</form>

    </div>

</div>
<?php
        include_once '../footer.php'
?>


</body>
</html>


