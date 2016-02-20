<?php
 require_once 'config.php';

 if(isset($_POST['btn']))

 {
 	

  $email   = trim($_POST['email']);
  $name    = trim($_POST['name']);
  $image   = trim($_FILES['image']['name']);
  $adminID = trim($_POST['btn']);
  $city   = trim($_POST['city']);
  $country   = trim($_POST['country']);
  $phone   = trim($_POST['phone']);
  
  try
  { 
  
  	if(empty($image)){

   $stmt = $db_con->prepare("UPDATE admin SET email=:email,name=:name,city=:city,country=:country,phone=:phone WHERE id =:id");
   $stmt->execute(array(":email"=>$email,":name"=>$name,":city"=>$city,":country"=>$country,":phone"=>$phone,":id"=>$adminID));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   header("location:manage_admins.php");

  
  	}
  	else{

   $stmt = $db_con->prepare("UPDATE admin SET email=:email,name=:name,city=:city,country=:country,phone=:phone,image=:image WHERE id =:id");
   $stmt->execute(array(":email"=>$email,":name"=>$name,":city"=>$city,":country"=>$country,"phone"=>$phone,":image"=>$image,":id"=>$adminID));

   // $stmt12 = $db_con->prepare("UPDATE admin_profile SET image=:image WHERE admin_id =:admin_id");
   // $stmt12->execute(array(":image"=>$image,":admin_id"=>$adminID));
   header("location:manage_admins.php");

  	}
  
  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>