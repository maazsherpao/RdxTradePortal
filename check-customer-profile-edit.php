<?php
session_start();
 require_once 'config.php';

 if(isset($_POST['btn']))

 {
  
  $email = trim($_POST['email']);
  //$user_password = randomPassword();
  //$_SESSION['ref'] = $user_password;
  //$password  = sha1($user_password);
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $city = trim($_POST['city']);
  $state = trim($_POST['state']);
  $country = trim($_POST['country']);
  $zip = trim($_POST['zip']);
  $phone = trim($_POST['phone']);
  $cellphone = trim($_POST['cellphone']);
  $fax = trim($_POST['fax']);
  $shipping_address = trim($_POST['shipping_address']);
  $billing_address = trim($_POST['billing_address']);
  $business_name = trim($_POST['business_name']);
  $secoundry_email = trim($_POST['secoundry_email']);
  $vat = trim($_POST['vat']);
  $resgistration_number = trim($_POST['resgistration_number']);
  $image   = trim($_FILES['image']['name']);
  $created_date  = date("Y-m-d H:i:s");
  $modified_date = date("Y-m-d H:i:s");
  $adminID = trim($_POST['btn']);
  $currency_id = trim($_POST['currency_id']);
  
  try
  { 
  
    if(empty($image)){

   $stmt = $db_con->prepare("UPDATE customers SET currency_id=:currency_id,email=:email,first_name=:first_name,last_name=:last_name,city=:city,state=:state,country=:country,zip=:zip,phone=:phone,cellphone=:cellphone,fax=:fax,shipping_address=:shipping_address,billing_address=:billing_address,business_name=:business_name,secoundry_email=:secoundry_email,vat=:vat,resgistration_number=:resgistration_number,modified_date=:modified_date WHERE id =:id");
   $stmt->execute(array(":currency_id"=>$currency_id,":email"=>$email,":first_name"=>$first_name,":last_name"=>$last_name,":city"=>$city,":state"=>$state,":country"=>$country,":zip"=>$zip,":phone"=>$phone,":cellphone"=>$cellphone,":fax"=>$fax,":shipping_address"=>$shipping_address,":billing_address"=>$billing_address,":business_name"=>$business_name,":secoundry_email"=>$secoundry_email,":vat"=>$vat,":resgistration_number"=>$resgistration_number,":modified_date"=>$modified_date,":id"=>$adminID));
   $_SESSION['first_name'] = $first_name;
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
  header("location:customer-profile.php");

  
    }
    else{

   $uploads_dir = 'assets/images/users/';
   $target_file = $uploads_dir . basename($_FILES["image"]["name"]);
   $tmp_name = $_FILES["image"]["tmp_name"];
   //$img_name = $_FILES["image"]["name"];
   move_uploaded_file($tmp_name, $target_file);

   $stmt = $db_con->prepare("UPDATE customers SET currency_id=:currency_id,email=:email,first_name=:first_name,last_name=:last_name,city=:city,state=:state,country=:country,zip=:zip,phone=:phone,cellphone=:cellphone,fax=:fax,shipping_address=:shipping_address,billing_address=:billing_address,business_name=:business_name,secoundry_email=:secoundry_email,vat=:vat,resgistration_number=:resgistration_number,image=:image,modified_date=:modified_date WHERE id =:id");
   $stmt->execute(array(":currency_id"=>$currency_id,":email"=>$email,":first_name"=>$first_name,":last_name"=>$last_name,":city"=>$city,":state"=>$state,":country"=>$country,":zip"=>$zip,":phone"=>$phone,":cellphone"=>$cellphone,":fax"=>$fax,":shipping_address"=>$shipping_address,":billing_address"=>$billing_address,":business_name"=>$business_name,":secoundry_email"=>$secoundry_email,":vat"=>$vat,":resgistration_number"=>$resgistration_number,":image"=>$image,":modified_date"=>$modified_date,":id"=>$adminID));
   $_SESSION['first_name'] = $first_name;
   // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   header("location:customer-profile.php");
    }
  
  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>