<?php
require("config.php");
$result = mysqli_query($mysqli,
"SELECT tb_purchase.purchase_id, tb_product.product_id, tb_product.product_name, tb_purchase.purchase_supplierid, tb_purchase.purchase_suppliername, tb_purchase.purchase_qtybought, tb_purchase.purchase_total
FROM tb_purchase
INNER JOIN tb_product
ON tb_purchase.product_id=tb_product.product_id;");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="product.css">
</head>

<body>
    <div class="topnav">
        <a href="dashboard.php">
            <img src="back.png" width="40" height="40" alt="" style="float:right">
        </a>

        <h1>Purchases</h1>
    </div>
    <br>
    <br>
    <br>
    <form action="add(purchase).php" method="post" name="form">
        <Table>


            <div class="container">
                <h4>Purchase</h4>
                <div class="row">
                    <div class="col-25">
                        <label for="product_Id">Product ID</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="product_Id" name="product_Id" placeholder="Product ID">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="supplier_Id">Supplier ID</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="supplier_Id" name="supplier_Id" placeholder="Supplier ID">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="supplierName">Supplier Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="supplierName" name="supplierName" placeholder="Supplier Name">

                    </div>
                </div>



                <div class="row">
                    <div class="col-25">
                        <label for="quantityBought">Quantity Bought</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="quantityBought" name="quantityBought" placeholder="Quantity Bought">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="totalPurchase">Total Purchase</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="totalPurchase" name="totalPurchase" placeholder="Total Purchase">

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
            <h4>List of Purchases</h4>
            <table>
                <div>
                    <tr>
                        <th>DATE</th>
                        <th>PRODUCT ID</th>
                        <th>PRODUCT NAME</th>
                        <th>SUPPLIER ID</th>
                        <th>SUPPLIER NAME</th>
                        <th>QUANTITY BOUGHT</th>
                        <th>TOTAL PURCHASE</th>
                        <th>MODIFY</th>
                    </tr>



                    <?php

                    while ($res = mysqli_fetch_array($result)) {
                        
                        echo "<tr>";
                        echo "<td>" . $res['product_id'] . "</td>";
                        echo "<td>" . $res['product_id'] . "</td>";
                        echo "<td>" . $res['product_name'] . "</td>";
                        echo "<td>" . $res['purchase_supplierid'] . "</td>";
                        echo "<td>" . $res['purchase_suppliername'] . "</td>";
                        echo "<td>" . $res['purchase_qtybought'] . "</td>";
                        echo "<td>" . $res['purchase_total'] . "</td>";
                        echo "<td><a href=\"update-form-purchase.php?id=$res[purchase_id]\" class'btn btn-success'>Edit</a> | <a href=\"delete(purchase).php?id=$res[purchase_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-danger'>Delete</a></td>";
                    }
                    ?>
                </div>

    </form>

</body>

</html>