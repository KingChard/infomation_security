<?php
require("config.php");
//getting id from url
$purchase_id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tb_purchase WHERE purchase_id=$purchase_id");
if(!$result){
  echo mysqli_error($mysqli);
}

while($res = mysqli_fetch_array($result))
{
    $productId = $res['product_id'];
    $supplierId= $res['purchase_supplierid'];
    $supplierName= $res['purchase_suppliername'];
    $quantityBought = $res['purchase_qtybought'];
    $totalPurchase = $res['purchase_total'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="account.css">
<title>Edit purchase</title>
</head>
<body>

<div class="topnav">
        <a href="purchase.php">
            <img src="back.png"   width= "40" height="40" alt="" style="float:right">
           </a>
         
      <h1>Purchase</h1>
    </div>
    <br>
    <br>
    <br>
<form action="update(purchase).php" method="post" name="form3">
<Table>
    <div class="container">
        <h4>EDIT PURCHASE</h4> 
          <div class="row">
            <div class="col-25">
              <label for="productId">PRODUCT ID</label>
            </div>
            <div class="col-75">
              <input type="text" id="productId" name="productId" value="<?php echo $productId;?>"  >
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="supplierId">SUPPLIER ID</label>
            </div>
            <div class="col-75">
              <input type="text" id="supplierId" name="supplierId" value="<?php echo $supplierId;?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="supplierName">SUPPLIER NAME</label>
            </div>
            <div class="col-75">
              <input type="text" id="supplierName" name="supplierName" value="<?php echo $supplierName;?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="quantityBought">QUANTITY BOUGHT</label>
            </div>
            <div class="col-75">
              <input type="text" id="quantityBought" name="quantityBought" value="<?php echo $quantityBought;?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="totalPurchase">TOTAL PURCHASE</label>
            </div>
            <div class="col-75">
              <input type="text" id="totalPurchase" name="totalPurchase" value="<?php echo $totalPurchase;?>">
            </div>
          </div>    
          </div>
          <div class="row">
            <div class="vertical-left">
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>> 
              <input type="submit" class="btn btn-success" name="update" value="UPDATE">
            </div>
          </div>
      </div>
      </form>
</body>
</html>
