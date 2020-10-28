<?php
// including the database connection file
require("config.php");

if(isset($_POST['update']))
{	

	$id = $_POST['id'];
  $customerName = $_POST['customer_name'];
  $productId = $_POST['product_Id'];
  $quantity = $_POST['order_Quantity'];
  $totalOrder = $_POST['total_Order'];
 
	
	//updating the table
	$result = mysqli_query($mysqli, "UPDATE tb_order SET order_customerid='$productId', order_customername='$customerName', product_id='$productId', order_qty='$quantity', order_total='$totalOrder' WHERE order_id=$id");
	
	//redirectig to the display page. In our case, it is index.php
	header("Location:order.php");
}
