<?php
//including the database connection file
require("config.php");

if(isset($_POST['Submit'])) {	
	$customerName = $_POST['customer_Name'];
	$productId = $_POST['product_Id'];
    $quantity = $_POST['Quantity'];
    $orderTotal = $_POST['order_Total'];
		
	//insert data to database	
	$result = mysqli_query($mysqli, "INSERT INTO tb_order(order_customername,product_id,order_qty,order_total) VALUES('$customerName','$productId','$quantity','$orderTotal')");
    header("location:order.php");
}
?> 