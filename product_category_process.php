<?php
 require_once 'config.php';

 if(isset($_POST['btn']))

 {

  
  $title = trim($_POST['title']);
  $created_date  = date("Y-m-d H:i:s");
  $modified_date = date("Y-m-d H:i:s");
  

  try

  { 

  

 
   $stmt = $db_con->prepare("INSERT INTO products_category (title,is_active,created_date,modified_date) VALUES(:title,:is_active,:created_date,:modified_date)");
   $stmt->execute(array(":title"=>$title,":is_active"=>1,":created_date"=>$created_date,":modified_date"=>$modified_date));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   header("location:product_categories.php");

  
    

   
  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>