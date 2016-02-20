<?php
 require_once 'config.php';

 if(isset($_POST['btn']))

 {


  //$customer_id = $_POST['customer_id'];
  $currency = $_POST['currency'];
  $value = $_POST['value'];
  $created_date  = date("Y-m-d H:i:s");
  $modified_date = date("Y-m-d H:i:s");
  $adminID = trim($_POST['btn']);
  
 
  try
  { 
  
  

   $stmt = $db_con->prepare("UPDATE customer_currency SET currency=:currency,value=:value,modified_date=:modified_date WHERE id =:id");
   $stmt->execute(array(":currency"=>$currency,"value"=>$value,":modified_date"=>$modified_date,":id"=>$adminID));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //$lastID = $db_con->lastInsertId();
   
   header("location:customer_currency.php");

  
  
  	
  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>