<?php
require_once 'config.php';
 session_start();
 

 if(isset($_POST['btn']))
 {
  $user_email = trim($_POST['username']);
  $user_password = trim($_POST['password']);
  
  $password = sha1($user_password);
  
  try
  { 
  
   $stmt = $db_con->prepare("SELECT * FROM admins WHERE email=:email");
   $stmt->execute(array(":email"=>$user_email));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
   
   if($row['password'] == $password && $row['is_active'] == 1){
    
    echo "ok"; // log in
    $_SESSION['user_session'] = $row['id'];
    $_SESSION['is_active']    = $row['is_active'];
    $_SESSION['is_super_admin'] = $row['is_super_admin'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['type'] = $row['type'];
   }
   else{
    
    echo "email or password does not exist."; // wrong details 
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }

?>