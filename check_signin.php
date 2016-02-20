<?php
require_once 'config.php';


 if(isset($_POST['name']))
 {

 // echo 'hello';
//exit;
  $name          = trim($_POST['name']);
  $user_password = trim($_POST['password']);
  $password      = sha1($user_password);
  $user_email    = trim($_POST['email']);
  $created_date  = date("Y-m-d H:i:s");
  $modified_date = date("Y-m-d H:i:s");
  
  try
  { 
  
   $stmt = $db_con->prepare("INSERT INTO customers (email,password,name,is_active,created_date,modified_date) VALUES(:email,:password,:name,:is_active,:created_date,:modified_date)");
   $stmt->execute(array(":email"=>$user_email,":password"=>$password,":name"=>$name,":is_active"=>1,":created_date"=>$created_date,":modified_date"=>$modified_date));
   echo "ok"; // Customer Registered
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }

?>