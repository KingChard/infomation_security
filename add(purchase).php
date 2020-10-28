<?php
    require("config.php");
if(isset($_POST['Add'])){
    $productId = $_POST['product_Id'];
    $supplierId = $_POST['supplier_Id'];
    $supplierName  = $_POST['supplierName'];
    $quantityBought= $_POST['quantityBought'];
    $totalPurchase = $_POST['totalPurchase'];

    $result = mysqli_query($mysqli, "INSERT INTO tb_purchase (product_id,purchase_supplierid,purchase_suppliername,purchase_qtybought,purchase_total) VALUES('$productId','$supplierId','$supplierName','$quantityBought','$totalPurchase')");

    if ($result){
      header("location:purchase.php");

    }else{
      echo "ERROR: Could not connect to database";
    }
}
