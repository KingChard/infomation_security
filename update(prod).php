<?php
// including the database connection file


if(isset($_POST['Update'])){
	fieldsValidation();
}

function fieldsValidation(){
  $product_id = $_POST['id'];
  $product_name = $_POST['product_Name'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $selling_price = $_POST['selling_Price'];

  if (productNameValidation($product_name) == true && quantityValidation($quantity) == true && priceValidation($price) && selling_priceValidation($selling_price) == true) {
    dataUpdate($product_id, $product_name, $quantity, $price, $selling_price);

  }
}

function productNameValidation(&$product_name){

  $pattern = '/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/';

  try{
    if ($product_name == "" || $product_name == null){
      echo "Product name is empty";
      return false;

    }elseif (strlen($product_name) > 250) {
      echo "Product name exceeds 250 characters";
      return false;

    }elseif (preg_match($pattern, $product_name)){
      echo "Product name contains special characters";
      return false;

    }else{
      return true;
    }

  }catch(\Exception $e){
    echo "ERROR: " . $e;
  }


}

function quantityValidation(&$quantity){

  $pattern = '/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/';

  try{
    if ($quantity == "" || $quantity == null){
      echo "Quantity is empty";
      return false;

    }elseif (!is_numeric($quantity)){
      echo "Quantity contains letters";
      return false;

    }elseif (preg_match($pattern, $quantity)){
      echo "Quantity contains special characters";
      return false;

    }else{
      return true;
    }

  }catch(\Exception $e){
    echo "ERROR: " . $e;
  }
}

function priceValidation(&$price){

  $pattern = '/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/';

  try{
    if ($price == "" || $price == null){
      echo "Price is empty";
      return false;

    }elseif (!is_numeric($price)){
      echo "Price contains letters";
      return false;

    }elseif (preg_match($pattern, $price)){
      echo "Price contains special characters";
      return false;

    }else{
      return true;
    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}

function selling_priceValidation(&$selling_price){

  $pattern = '/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/';

  try{
    if ($selling_price == "" || $selling_price == null){
      echo "Selling price is empty";
      return false;

    }elseif (!is_numeric($selling_price)){
      echo "Selling price contains letters";
      return false;

    }elseif (preg_match($pattern, $selling_price)){
      echo "Selling price contains special characters";
      return false;

    }else{
      return true;
    }

  }catch (\Exception $e){
    echo "ERROR: " . $e;
  }
}

function dataUpdate(&$product_id, &$product_name, &$quantity, &$price, &$selling_price){

  try{

    require("config.php");
    $result = mysqli_query($mysqli, "UPDATE tb_product SET product_name='$product_name',product_quantity='$quantity',product_price='$price',product_sellingprice='$selling_price' WHERE product_id=$product_id");
    header("Location:product.php");

  }catch(\Exception $e){
    echo "ERROR: " . $e;

  }
}
?>

