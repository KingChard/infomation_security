<?php
session_start();
require("config.php");
// if(isset($_POST['Submit'])){
//   logInValidation();
// }

// function logInValidation(){

//   include_once("config.php");

//   $username = mysqli_real_escape_string($mysqli,$_POST['user']);
//   $pass = mysqli_real_escape_string($mysqli,$_POST['pass']);

//   if($username == "" || $pass == ""){
//     echo "Empty fields detected";

//   }else{

//   $query = "SELECT * FROM tb_user WHERE (email='$username' OR username= '$username') and password='$pass'";
//   $result = mysqli_query($mysqli,$query);
//   $row = mysqli_fetch_array($result);
//   // $active = $row['active'];

//   $count = mysqli_num_rows($result);

//   if($count == 1){
//       header ("Location:dashboard.php");

//   }else{
//       echo "Invalid username or password";
//   }
// }
// }

if(isset($_POST['Submit'])){
  fieldsValidation();

}

function fieldsValidation(){
  $loginAttempt = 3;
  include("config.php");
  $username = mysqli_real_escape_string($mysqli,$_POST['user']);
  $password = mysqli_real_escape_string($mysqli,$_POST['pass']);
  if(loginValidation($username, $password) == true){
    applicationLogin($username, $password);

  }elseif ($loginAttempt == 0) {
    echo "Log in attempts exhausted";

  }else{
    $loginAttempt--;

  }
}

function loginValidation(&$username, &$password){

  $pattern = '/[~`!@#$%^&()_={}[\]:;,.<>+\/?-]/';
  
  if ($username == "" || $password == ""){
    echo "Field/s are empty";
    return false;

  // }elseif (!preg_match($pattern, $username) || !preg_match($pattern, $password)){
  //   echo "Invalid username or password";

  }else{
    return true;

  }

}

function applicationLogin(&$username, &$password){

  try {
    include("config.php");
    
    $query = "SELECT * FROM tb_user WHERE (user_email='$username' OR user_username= '$username') and user_password='$password'";
    $result = mysqli_query($mysqli,$query);
    $row = mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);

    if($count == 1){
        header ("Location:dashboard.php");

    }else{
        echo "Error";
    }

  } catch (\Exception $e) {
    echo "ERROR: " . $e;
  }
} 
?>