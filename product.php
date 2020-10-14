<?php
include("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM tb_product ORDER BY product_id DESC"); // using mysqli_query instead
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="product.css">
</head>
<body>
<div class="topnav">
    <a href="home.html">
        <img src="image/back.png"   width= "40" height="40" alt="" style="float:right">
       </a>
     
  <h1>PRODUCT</h1>
</div>
<br>
<br>
<br>
<form action="add(product).php" method="post" name="form">
<Table>


<div class="container">
    <h4>ADD PRODUCT</h4> 
      <div class="row">
        <div class="col-25">
          <label for="productName">Product Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="productName" name="product_Name" placeholder="PRODUCT NAME..">
         
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="quantity">Quantity</label>
        </div>
        <div class="col-75">
          <input type="text" id="quantity" name="quantity" placeholder="QUANTITY..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="price">Price</label>
        </div>
        <div class="col-75">
          <input type="text" id="price" name="price" placeholder="PRICE..">
         
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="sellingPrice">Selling Price</label>
        </div>
        <div class="col-75">
          <input type="text" id="sellingPrice" name="selling_Price" placeholder="SELLING PRICE..">
         
        </div>
      </div>
      </div>
      <div class="row">
        <div class="vertical-left">
           <input type="submit" name="Add" value="ADD">
        </div>
       
      </div>
   
  </div>
</Table>
<br>

<div class="container">
<h4>VIEW LIST OF PRODUCT</h4> 
<table>
<div>
  <tr>
    <th>PRODUCT ID</th>
    <th>PRODUCT NAME</th>
    <th>QUANTITY</th>
    <th>PRICE</th>
    <th>SELLING PRICE</th>
    <th>MODIFY</th>
  </tr>
  


<?php

	while($res = mysqli_fetch_array($result)){

	echo "<tr>";
	echo "<td>".$res['product_id']."</td>";
	echo "<td>".$res['product_name']."</td>";
  echo "<td>".$res['product_quantity']."</td>";
  echo "<td>".$res['product_price']."</td>";
  echo "<td>".$res['product_sellingprice']."</td>";
	echo "<td><a href=\"update-form-prod.php?id=$res[product_id]\" class'btn btn-success'>Edit</a> | <a href=\"delete(prod).php?id=$res[product_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-danger'>Delete</a></td>";
	}
?>
</div>

</form>

</body>
</html>