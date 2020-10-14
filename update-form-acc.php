<?php
require("config.php");

//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tb_user WHERE user_id=$id");
if(!$result){
  echo mysqli_error($mysqli);
}

while($res = mysqli_fetch_array($result))
{
  $lname = $res['user_lname'];
  $fname = $res['user_fname'];
  $mname =$res['user_mname'];
  $address = $res['user_address'];
  $email = $res['user_email'];
  $contactnumber = $res['user_contactno'];
  $username = $res['user_username'];
  $password =$res['user_password'];
 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="account.css">
<title>Edit account</title>
</head>
<body>

<div class="topnav">
        <a href="account.php">
            <img src="back.png"   width= "40" height="40" alt="" style="float:right">
           </a>
         
      <h1>ACCOUNT</h1>
    </div>
    <br>
    <br>
    <br>
<form action="update(account).php" method="post" name="form1">
<Table>
    <div class="container">
        <h4>EDIT ADMIN</h4> 
          <div class="row">
            <div class="col-25">
              <label for="fname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="fname" value="<?php echo $fname;?>"  >
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="MiddleName">Middle Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="MiddleName" name="mName" value="<?php echo $mname;?>">
             
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lname" value="<?php echo $lname;?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="contactNumber">Contact Number</label>
            </div>
            <div class="col-75">
              <input type="text" id="contactNumber" name="contactNumber" value="<?php echo $contactnumber;?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="Address">Address</label>
            </div>
            <div class="col-75">
              <input type="text" id="Address" name="address" value="<?php echo $address;?>">
             
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="Email">Email</label>
            </div>
            <div class="col-75">
              <input type="email" id="email" name="email" value="<?php echo $email;?>">
             
            </div>
          </div>
          
          <div class="row">
            <div class="col-25">
              <label for="UserName">User Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="UserName" name="userName" value="<?php echo $username;?>">
             
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="Password">Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="Password" name="password" value="<?php echo $password;?>">
             
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
