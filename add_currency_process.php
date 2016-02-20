<?php
 require_once 'config.php';

 if(isset($_POST['btn']))

 {

  //$customer_id = $_POST['customer_id'];
  $currency = $_POST['currency'];
  $value = $_POST['value'];
  $created_date  = date("Y-m-d H:i:s");
  $modified_date = date("Y-m-d H:i:s");

  try

  { 

   $stmt = $db_con->prepare("INSERT INTO customer_currency (currency,value,created_date,modified_date) VALUES(:customer_id,:currency,:value,:created_date,:modified_date)");
   $stmt->execute(array("customer_id"=>$customer_id,":currency"=>$currency,":value"=>$value,":created_date"=>$created_date,":modified_date"=>$modified_date));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
   header("location:customer_currency.php");

  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>