<?php
 require_once 'config.php';
 session_start();
 if(isset($_POST['btn-customer-login']))
 {
  $admin_email = trim($_POST['email']);
  $admin_password = trim($_POST['password']);
  $password = sha1($admin_password);
  
  try
  { 
  
   $stmt = $db_con->prepare("SELECT * FROM customers WHERE email=:email");
   $stmt->execute(array(":email"=>$admin_email));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
   
   if($row['password'] == $password){
    
    if($row['is_active'] == 1){
      echo "ok"; // log in
    $_SESSION['customer_id'] = $row['id'];
    //$_SESSION['is_active']    = $row['is_active'];
    //$_SESSION['is_super_admin'] = $row['is_super_admin'];
    $_SESSION['first_name'] = $row['first_name'];
    //$_SESSION['type'] = $row['type'];
  }else{
    echo "Your Account is blocked. Please email at trade@rdxsports.com to unblock your account";
  }
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