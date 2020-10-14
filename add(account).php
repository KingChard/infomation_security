<?php
require("config.php");

if(isset($_POST['Submit'])) {
  fieldsValidation();
}

//CHECKS ALL THE FIELDS IF THEY ARE VALID BEFORE DATA INSERTION. EACH FUNCTIONS MUST RETURN THE VALUE 'true' OTHERWISE DATA CANNOT BE INSERTED TO DATABASE
function fieldsValidation(){
  $lname = $_POST['lname'];
  $fname = $_POST['fname'];
  $mname = $_POST['mName'];
	$address = $_POST['address'];
	$email = $_POST['email'];
  $contactnumber = $_POST['contactNumber'];
  $username = $_POST['userName'];
  $password = $_POST['password'];

  if (lnameValidation($lname) == true && fnameValidation($fname) == true && mnameValidation($mname) == true && addressValidation($address) == true && emailValidation($email) == true && contactNumberValidation($contactnumber) == true && usernameValidation($username) == true && passwordValidation($password) == true){
    dataInsert($lname, $fname, $mname, $address, $email, $contactnumber, $username, $password);

  }
}


function lnameValidation(&$lname){

  $pattern = '/^[a-zA-Z ]+$/';

  try{
    if ($lname == null || $lname == ""){
      echo "Last Name is empty";
      return false;

    }elseif (strlen($lname) > 40){
      echo "Last Name exceeds 40 characters";
      return false;

    }elseif (is_numeric($lname)){
      echo "Last Name contains numbers";
      return false;

    }elseif (strlen($lname) < 3){
      echo "Last Name is 3 characters less";
      return false;

    }elseif (!preg_match($pattern, $lname)) {
      echo "1st letter of Last Name must be uppercase";
      return false;

    }else{
      return true;

    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}

function fnameValidation(&$fname){

  $pattern = '/^[a-zA-Z ]+$/';

  try{
    if ($fname == null || $fname == ""){
      echo "First Name is empty";
      return false;

    }elseif (strlen($fname) > 40){
      echo "First Name exceeds 40 characters";
      return false;

    }elseif (is_numeric($fname)){
      echo "First Name contains numbers";
      return false;

    }elseif (strlen($fname) < 3){
      echo "First Namee is 3 characters less";
      return false;

    }elseif (!preg_match($pattern, $fname)) {
      echo "1st letter of First Name must be uppercase";
      return false;

    }else{
      return true;

    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}

function mnameValidation(&$mname){

  $pattern = '/^[a-zA-Z ]+$/';

  try{
    if ($mname == null || $mname == ""){
      echo "Middle Name is empty";
      return false;

    }elseif (strlen($mname) > 40){
      echo "Middle Name exceeds 40 characters";
      return false;

    }elseif (is_numeric($mname)){
      echo "Middle Name contains numbers";
      return false;

    }elseif (strlen($mname) < 3){
      echo "Middle Namee is 3 characters less";
      return false;

    }elseif (!preg_match($pattern, $mname)) {
      echo "1st letter of Middle Name must be uppercase";
      return false;

    }else{
      return true;

    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}

function addressValidation(&$address){

  $pattern = '/[A-Za-z0-9\-\\,.]+/';

  try{
    if ($address == null || $address == ""){
      echo "Address is empty";
      return false;

    }elseif (!preg_match($pattern, $address)){
      echo "Invalid Address";
      return false;

    }else{
      return true;

    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}

function emailValidation(&$email){

  $pattern = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';

  try{
    if ($email == null || $email == ''){
      echo "Email is empty";
      return false;

    }elseif(!preg_match($pattern, $email)){
      echo "Invalid Email";
      return false;

    }else{
      return true;
    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}

function contactNumberValidation(&$contactnumber){
  $pattern = '/^[0-9]{10}+$/';

  try{
    if ($contactnumber == null || $contactnumber == ''){
      echo "Contact number is empty";
      return false;

    }elseif (strlen($contactnumber) > 11){
      echo "Contact Number exceeded 11 numbers";
      return false;

    }elseif (strlen($contactnumber) < 11){
      echo "Contact Number incomplete";
      return false;

    }elseif (!is_numeric($contactnumber)){
      echo "Invalid Contact Number";
      return false;

    }else{
      return true;

    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}

function usernameValidation(&$username){

  try{
    if($username == null || $username == ''){
      echo "Username is empty";
      return false;

    }elseif(strlen($username) > 14){
      echo "Username exceeded 14 characters";
      return false;

    }elseif(strlen($username) < 5){
      echo "Username must be at least 5 characters";
      return false;

    }else{
      return true;
    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}

function passwordValidation(&$password){

  try{
    if($password == null || $password == ''){
      echo "Password is empty";
      return false;

    }elseif(strlen($password) > 14){
      echo "Password exceeded 14 characters";
      return false;

    }elseif(strlen($password) < 5){
      echo "Password must be at least 5 characters";
      return false;

    }else{
      return true;
    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}
function dataInsert(&$lname, &$fname, &$mname, &$address, &$email, &$contactnumber, &$username, &$password){
include("config.php");
  try{
   
    $result = mysqli_query($mysqli, "INSERT INTO tb_user (user_lname,user_fname,user_mname,user_contactno,user_address,user_email,user_username,user_password) VALUES('$lname','$fname','$mname','$contactnumber','$address','$email','$username','$password')");

  	if ($result){
  		header("location:account.php");

  	}else{
  		echo "ERROR: Could not connect to database";
  	}

  }catch (\Exception $e){
    echo "ERROR: " + $e;
  }
}
?>
