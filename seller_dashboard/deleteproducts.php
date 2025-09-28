<?php
    include_once '../connect.php';
    
    ?>

<?php


$product_id = $_GET['product_id'];
$query = "DELETE FROM product WHERE product_id ='$product_id'";

$data = mysqli_query($conn,$query);

if($data){
    echo "<script>alert('Record Deleted!!')</script>";
    echo "<Script> window.location.href='view_products.php'</Script>";
    

}else{
    echo "<script>alert('Error')</script>";
}

mysqli_close($conn);



?>

