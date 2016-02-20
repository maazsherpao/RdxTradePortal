<?php
 require_once 'config.php';
 session_start();
 if(isset($_POST['btn-customer-change-password']))
 {
  $old_password = trim($_POST['old_password']);
  $new_password = trim($_POST['new_password']);
  $password     = sha1($old_password);
  $new          = sha1($new_password);
  $id           = $_SESSION['customer_id'];
  
  try
  { 
  
   $stmt = $db_con->prepare("SELECT * FROM customers WHERE password=:password");
   $stmt->execute(array(":password"=>$password));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
   
   if($count > 0 ){

    $stmt = $db_con->prepare("UPDATE customers SET password=:password WHERE id=:id");
    $stmt->execute(array(":password"=>$new,":id"=>$id));
    //$row = $stmt->fetch(PDO::FETCH_ASSOC);
    //$count = $stmt->rowCount();
    
    echo "ok"; // log in
    
   }
   else{
    
    echo "Old Password Incorrect"; // wrong details 
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }

?>