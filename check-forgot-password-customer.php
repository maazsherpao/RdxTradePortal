<?php
require_once 'config.php';
 session_start();
 

 if(isset($_POST['btn-forgot-password-admin']))
 {
  $user_email = trim($_POST['email']);
  //$user_password = trim($_POST['password']);
  //$password = sha1($user_password);
  
  try
  { 
  
   $stmt = $db_con->prepare("SELECT * FROM customers WHERE email=:email");
   $stmt->execute(array(":email"=>$user_email));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
   
   if($count > 0){
    
    $password = rand(1000,10000);
    $shpassword = sha1($password);
    $stmt1 = $db_con->prepare("UPDATE customers SET password = :password WHERE email = :email");
    $stmt1->execute(array("password"=>$shpassword,":email"=>$user_email));

    // Send Email to the user

     $to      = $user_email;
     $name    = $row['name'];
     $subject = "Password Reset";
     $header  = 'From:RDX SPORT <trade@rdxsports.com>' ."\r\n";
     $body    = "Hello {$name},\n\nYour new password is: {$password}";

     mail($to, $subject, $body,$header);
    
     echo "ok"; 
   }
   else{
    
    echo "Email does not exist."; // wrong details 
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }

?>