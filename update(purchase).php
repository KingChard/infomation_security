<?php
// including the database connection file
require("config.php");

if(isset($_POST['update']))
{	

    $id = $_POST['id'];
  $productId = $_POST['productId'];  
  $supplierId = $_POST['supplierId'];
  $supplierName = $_POST['supplierName'];
  $quantityBought = $_POST['quantityBought'];
  $totalPurchase = $_POST['totalPurchase'];
 
	
	//updating the table
	$result = mysqli_query($mysqli, "UPDATE tb_purchase SET product_id='$productId', purchase_supplierid='$supplierId', purchase_suppliername='$supplierName', purchase_qtybought='$quantityBought', purchase_total='$totalPurchase' WHERE purchase_id=$id");
	
	//redirectig to the display page. In our case, it is index.php
	header("Location:purchase.php");
}
