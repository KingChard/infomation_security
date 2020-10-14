<?php
include("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM tb_user ORDER BY user_id DESC"); // using mysqli_query instead
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="account.css">
<title>Account tab</title>
</head>
<body>
    <div class="topnav">
        <a href="dashboard.php">
            <img src="back.png"   width= "40" height="40" alt="" style="float:right">
           </a>

      <h1>ACCOUNT</h1>
    </div>
    <br>
    <br>
    <br>
<form action="add(account).php" method="post" name="form">
<Table>


    <div class="container">
        <h4>ADD ADMIN</h4>
          <div class="row">
            <div class="col-25">
              <label for="fname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="fname" placeholder="FIRST NAME..">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="MiddleName">Middle Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="MiddleName" name="mName" placeholder="MIDDLE NAME..">

            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lname" placeholder="LASTNAME..">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="contactNumber">Contact Number</label>
            </div>
            <div class="col-75">
              <input type="text" id="contactNumber" name="contactNumber" placeholder="CONTACT NUMBER..">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="Address">Address</label>
            </div>
            <div class="col-75">
              <input type="text" id="Address" name="address" placeholder="ADDRESS..">

            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="Email">Email</label>
            </div>
            <div class="col-75">
              <input type="email" id="email" name="email" placeholder="EMAIL..">

            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="UserName">User Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="UserName" name="userName" placeholder="USERNAME..">

            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="Password">Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="password" name="password" placeholder="PASSWORD..">

            </div>
          </div>

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
  <h4>VIEW LIST OF ADMIN</h4>
   <table>
    <div>
      <tr>
        <th>NAME</th>
        <th>USERNAME</th>
        <th>EMAIL</th>
        <th>CONTACT NUMBER</th>
        <th>MODIFY</th>

      </tr>

<?php

	while($res = mysqli_fetch_array($result)){

		echo "<tr>";
		echo "<td>".$res['user_lname']."</td>";
		echo "<td>".$res['user_username']."</td>";
    echo "<td>".$res['user_email']."</td>";
    echo "<td>".$res['user_contactno']."</td>";
		echo "<td><a href=\"update-form-acc.php?id=$res[user_id]\" class'btn btn-success'>Edit</a> | <a href=\"delete(account).php?id=$res[user_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-danger'>Delete</a></td>";
	}
?>
    </div>

</form>





</body>
</html>
