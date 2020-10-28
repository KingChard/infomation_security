<?php
require("config.php");
$result = mysqli_query($mysqli, 
"SELECT tb_order.order_id, tb_order.order_customerid,tb_order.order_customername, tb_product.product_id, tb_product.product_name, tb_order.order_qty, tb_order.order_total
FROM tb_order
INNER JOIN tb_product
ON tb_order.product_id=tb_product.product_id;"); 

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="account.css">
    <title>Order tab</title>
</head>

<body>
    <div class="topnav">
        <a href="dashboard.php">
            <img src="back.png" width="40" height="40" alt="" style="float:right">
        </a>

        <h1>ORDERS</h1>
    </div>
    <br>
    <br>
    <br>
    <form action="add(order).php" method="post" name="form">
        <Table>


            <div class="container">
                <h4>ORDERS</h4>
                <div class="row">
                    <div class="col-25">
                        <label for="cname">Customer Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="cname" name="customer_Name" placeholder="Customer Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="productid">Product ID</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="productid" name="product_Id" placeholder="Product ID">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="orderQty">Order Quantity</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="orderQty" name="Quantity" placeholder="Order Quantity">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="ordertotal">Total Order</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="ordertotal" name="order_Total" placeholder="Total Order">

                    </div>

                    <div class="row">
                        <div class="vertical-left">
                            <input type="submit" name="Submit" value="ADD">
                        </div>

                    </div>

                </div>
        </Table>
        <br>



        <div class="container">
            <h4>List of Orders</h4>
            <table>
                <div>
                    <tr>
                        <th>Date</th>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Order</th>
                        <th>Modify</th>

                    </tr>

                    <?php

                    while ($res = mysqli_fetch_array($result)) {

                        echo "<tr>";
                        echo "<td>" . $res['order_id'] . "</td>";
                        echo "<td>" . $res['order_id'] . "</td>";
                        echo "<td>" . $res['order_customerid'] . "</td>";
                        echo "<td>" . $res['order_customername'] . "</td>";
                        echo "<td>" . $res['product_id'] . "</td>";
                        echo "<td>" . $res['product_name'] . "</td>";
                        echo "<td>" . $res['order_qty'] . "</td>";
                        echo "<td>" . $res['order_total'] . "</td>";
                        echo "<td><a href=\"update-form-order.php?id=$res[order_id]\" class'btn btn-success'>Edit</a> | <a href=\"delete(order).php?id=$res[order_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-danger'>Delete</a></td>";
                    }
                    ?>
                </div>

    </form>





</body>

</html>