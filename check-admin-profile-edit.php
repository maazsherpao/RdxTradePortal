<?php
session_start();
require_once 'config.php';

 if(isset($_POST['btn-admin-edit']))

 {
 
  $name             = trim($_POST['name']);
  $city             = trim($_POST['city']);
  $country          = trim($_POST['country']);
  $phone            = trim($_POST['phone']);
  $image            = trim($_FILES['image']['name']);
  $adminID       = $_SESSION['user_session'];
  $modified_date    = date("Y-m-d H:i:s");

  try

  { 

   if(empty($image))
   {

      $stmt = $db_con->prepare("UPDATE admin SET name = :name, city = :city ,country=:country, phone=:phone,modified_date =:modified_date WHERE id =:id");
      $stmt->execute(array("name"=>$name,":city"=>$city,":country"=>$country,":phone"=>$phone,":modified_date"=>$modified_date,":id"=>$adminID));
      header("location:profile.php");

   }
 else{

   $uploads_dir = 'assets/images/users/';
   $target_file = $uploads_dir . basename($_FILES["image"]["name"]);
   $tmp_name = $_FILES["image"]["tmp_name"];
   //$img_name = $_FILES["image"]["name"];
   move_uploaded_file($tmp_name, $target_file);

   $stmt = $db_con->prepare("UPDATE admin SET name = :name, city = :city ,country=:country, phone=:phone,image=:image,modified_date =:modified_date WHERE id =:id");
   $stmt->execute(array("name"=>$name,":city"=>$city,":country"=>$country,":phone"=>$phone,":image"=>$image,":modified_date"=>$modified_date,":id"=>$adminID));
   header("location:profile.php");


 }

   

  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>