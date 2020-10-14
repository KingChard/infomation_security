<?php
// including the database connection file
require("config.php");

if(isset($_POST['Update']))
{	

	$id = $_POST['id'];
	
  $lname = $_POST['lname'];
  $fname = $_POST['fname'];
  $mname = $_POST['mName'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $contactnumber = $_POST['contactNumber'];
  $username = $_POST['userName'];
  $password = $_POST['password'];
	
	//updating the table
	$result = mysqli_query($mysqli, "UPDATE tb_user SET user_lname='$lname',user_fname='$fname',user_mname='$mname',user_contactno='$contactnumber',user_address='$address',user_email='$email',user_username='$username',user_password='$password' WHERE user_id=$id");
	
	//redirectig to the display page. In our case, it is index.php
	header("Location:account.php");
}
