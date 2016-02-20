<?php
 require_once 'config.php';

 if(isset($_POST['btn']))

 {
 	

 
  $title = trim($_POST['title']);
  $modified_date = date("Y-m-d H:i:s");
  $adminID = trim($_POST['btn']);
  
  try
  { 
  	

   $stmt = $db_con->prepare("UPDATE products_category SET title=:title,modified_date=:modified_date WHERE id =:id");
   $stmt->execute(array(":title"=>$title,":modified_date"=>$modified_date,":id"=>$adminID));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   header("location:product_categories.php");

  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>