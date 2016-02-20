<?php
 require_once 'config.php';

 if(isset($_POST['btn']))

 {

  $email = trim($_POST['email']);
  $name = trim($_POST['name']);
  $user_password = trim($_POST['password']);
  $password = sha1($user_password);
  $image   = trim($_FILES['image']['name']);
  $created_date  = date("Y-m-d H:i:s");
  $modified_date = date("Y-m-d H:i:s");
  $type = "admin";
  $designation = "Admin Manager";
  $city = trim($_POST['city']);
  $country = trim($_POST['country']);
  $phone = trim($_POST['phone']);


  try

  { 

  

  if(empty($image)){

   $stmt = $db_con->prepare("INSERT INTO admin(email,password,name,designation,city,country,phone,type,is_super_admin,created_date,modified_date) VALUES(:email,:password,:name,:designation,:city,:country,:phone,:type,:is_super_admin,:created_date,:modified_date)");
   $stmt->execute(array("email"=>$email,"password"=>$password,"name"=>$name,"designation"=>$designation,"city"=>$city,"country"=>$country,"phone"=>$phone,"type"=>$type,"is_super_admin"=>0,"created_date"=>$created_date,"modified_date"=>$modified_date));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   header("location:manage_admins.php");

  
    }
    else{
   $uploads_dir = 'assets/images/users/';
   $target_file = $uploads_dir . basename($_FILES["image"]["name"]);
   $tmp_name = $_FILES["image"]["tmp_name"];
   //$img_name = $_FILES["image"]["name"];
   move_uploaded_file($tmp_name, $target_file);

    $stmt = $db_con->prepare("INSERT INTO admin(email,password,name,designation,city,country,phone,image,type,is_active,is_super_admin,created_date,modified_date) VALUES(:email,:password,:name,:designation,:city,:country,:phone,:image,:type,:is_active,:is_super_admin,:created_date,:modified_date)");
   $stmt->execute(array("email"=>$email,"password"=>$password,"name"=>$name,"designation"=>$designation,"city"=>$city,"country"=>$country,"phone"=>$phone,":image"=>$image,"type"=>$type,"is_active"=>1,"is_super_admin"=>0,"created_date"=>$created_date,"modified_date"=>$modified_date));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   // $lastID = $db_con->lastInsertId();

   // $stmt12 = $db_con->prepare("INSERT INTO admin_profile (admin_id,designation,image,created_date,modified_date) VALUES(:admin_id,:designation,:image,:created_date,:modified_date)");
   // $stmt12->execute(array(":admin_id"=>$lastID,":designation"=>'Admin Manager',":image"=>$image,":created_date"=>$created_date,"modified_date"=>$modified_date));
    header("location:manage_admins.php");

    }
   
  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>