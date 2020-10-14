<?php
//including the database connection file
require("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM tb_user WHERE user_id=$id");

//redirecting to the display page (index.php in our case)
header("Location:account.php");
?>