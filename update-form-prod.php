<?php
require("config.php");
//getting id from url
$product_id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tb_product WHERE product_id=$product_id");
if(!$result){
  echo mysqli_error($mysqli);
}

while($res = mysqli_fetch_array($result))
{
    $product_name = $res['product_name'];
    $quantity = $res['product_quantity'];
    $price = $res['product_price'];
    $selling_price = $res['product_sellingprice'];
    
 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="account.css">
<title>Edit product</title>
</head>
<body>

<div class="topnav">
        <a href="product.php">
            <img src="back.png"   width= "40" height="40" alt="" style="float:right">
           </a>
         
      <h1>Product</h1>
    </div>
    <br>
    <br>
    <br>
<form action="update(prod).php" method="post" name="form2">
<Table>
    <div class="container">
        <h4>EDIT ADMIN</h4> 
          <div class="row">
            <div class="col-25">
              <label for="prod_name">Product Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="prod_name" name="product_Name" value="<?php echo $product_name;?>"  >
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="quantity">Quantity</label>
            </div>
            <div class="col-75">
              <input type="text" id="quantity" name="quantity" value="<?php echo $quantity;?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="price">Price</label>
            </div>
            <div class="col-75">
              <input type="text" id="price" name="price" value="<?php echo $price;?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="sell_price">Selling Price</label>
            </div>
            <div class="col-75">
              <input type="text" id="selling_Price" name="selling_Price" value="<?php echo $selling_price;?>">
            </div>
          </div>    
          </div>
          <div class="row">
            <div class="vertical-left">
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>> 
              <input type="submit" class="btn btn-success" name="Update" value="UPDATE">
            </div>
          </div>
      </div>
      </form>
</body>
</html>
