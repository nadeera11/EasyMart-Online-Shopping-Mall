<?php
include_once '../connect.php';

if(isset($_POST['update_product'])){
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];


    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = "uploads/" .basename($image);
 
 
    $query = "UPDATE product SET
                name='$name',
                price='$price',
                quantity='$quantity',
                description = '$description',
                image = '$image' WHERE product_id = '$product_id'"; 
                move_uploaded_file($image_tmp_name, $image_folder);
                
                

    $data = mysqli_query($conn,$query);

    if($data){
       
        echo "<script>alert('Product updated successfully'); 
        window.location.href='view_products.php';
        </script>";
    
    }
    
    else{
        echo "<script>alert('Failed to update product');  
        window.location.href='update_product.php';</script>";
   
    }


}


?>



