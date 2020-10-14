<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['Update']))
{	

  $product_id = $_POST['id'];
  $product_name = $_POST['product_Name'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $selling_price = $_POST['selling_Price'];
  
	
	//updating the table
	$result = mysqli_query($mysqli, "UPDATE tb_product SET product_name='$product_name',product_quantity='$quantity',product_price='$price',product_sellingprice='$selling_price' WHERE product_id=$product_id");
	
	//redirectig to the display page. In our case, it is index.php
	header("Location:product.php");
}
?>
