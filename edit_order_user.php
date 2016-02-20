<?php
 require_once 'config.php';

 if(isset($_POST['btn']))

 {

  // echo "<pre>";
  // print_r($_POST);
  // exit;
 	
  $total_quantity = trim($_POST['total_quantity']);
  $total_price = trim($_POST['total_price']);
  $vat = trim($_POST['vat']);
  $ship = trim($_POST['ship']);
  $created_date  = date("Y-m-d H:i:s");
  $modified_date = date("Y-m-d H:i:s");
  $discount = trim($_POST['discount']);
  $adminID = trim($_POST['btn']);
  
  if(!empty($discount)){

    $getDiscount = ($discount/100)*$total_price;
    $discountedPrice = $total_price - $getDiscount;
    //$bigPrice = $discountedPrice

  }
  else{

    $discountedPrice = $total_price;
  }

  if(!empty($vat)){

    $getVat = ($vat/100)*$total_price;
    $vatPrice = $discountedPrice + $getVat;

  }
  else{

    $vatPrice        = $discountedPrice;
  }

  if(!empty($ship)){

    $grandTotal = $ship+$vatPrice;

  }
   
  //$grandTotal =  $vatPrice + $getShip $discountedPrice ;
  
  try
  { 
  
  	

   $stmt = $db_con->prepare("UPDATE order_detail SET total_quantity=:total_quantity,total_price=:total_price,vat=:vat,ship=:ship,discount=:discount,modified_date=:modified_date WHERE invoice_no =:invoice_no");
   $stmt->execute(array(":total_quantity"=>$total_quantity,":total_price"=>$grandTotal,":vat"=>$vat,":ship"=>$ship,":discount"=>$discount,":modified_date"=>$modified_date,":invoice_no"=>$adminID));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   header("location:orders.php");
  
  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>