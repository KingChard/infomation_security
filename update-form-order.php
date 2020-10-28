<?php
require("config.php");
//getting id from url
$order_id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tb_order WHERE order_id=$order_id");
if(!$result){
  echo mysqli_error($mysqli);
}

while($res = mysqli_fetch_array($result))
{
    $customer_Name = $res['order_customername'];
    $product_Id = $res['product_id'];
    $quantity = $res['order_qty'];
    $total_Order = $res['order_total'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="account.css">
<title>Edit order</title>
</head>
<body>

<div class="topnav">
        <a href="order.php">
            <img src="back.png"   width= "40" height="40" alt="" style="float:right">
           </a>
         
      <h1>Order</h1>
    </div>
    <br>
    <br>
    <br>
<form action="update(order).php" method="post" name="form3">
<Table>
    <div class="container">
        <h4>EDIT ORDER</h4> 
          <div class="row">
            <div class="col-25">
              <label for="customer_name">Customer Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="customer_name" name="customer_name" value="<?php echo $customer_Name;?>"  >
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="poduct_Id">Product ID</label>
            </div>
            <div class="col-75">
              <input type="text" id="product_Id" name="product_Id" value="<?php echo $product_Id;?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="order_Quantity">Order Quantity</label>
            </div>
            <div class="col-75">
              <input type="text" id="order_Quantity" name="order_Quantity" value="<?php echo $quantity;?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="total_Order">Total Order</label>
            </div>
            <div class="col-75">
              <input type="text" id="total_Order" name="total_Order" value="<?php echo $total_Order;?>">
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
