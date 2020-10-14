<?php
require("config.php");

if(isset($_POST['Add'])) {
    $product_name = $_POST['product_Name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $selling_price = $_POST['selling_Price'];  
    
    $result = mysqli_query($mysqli, "INSERT INTO tb_product (product_name,product_quantity,product_price,product_sellingprice) VALUES('$product_name','$quantity','$price','$selling_price')");
  
        if ($result){
            header("location:product.php");
  
        }else{
            echo "ERROR: Could not connect to database";
        }
}


?>
