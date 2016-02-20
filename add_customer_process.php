<?php
 require_once 'config.php';
session_start();
 if(isset($_POST['btn']))

 {

  function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

  $email = trim($_POST['email']);
  $user_password = randomPassword();
  $_SESSION['ref'] = $user_password;
  $password  = sha1($user_password);
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $city = trim($_POST['city']);
  $state = trim($_POST['state']);
  $country = trim($_POST['country']);
  $zip = trim($_POST['zip']);
  $phone = trim($_POST['phone']);
  $cellphone = trim($_POST['cellphone']);
  $fax = trim($_POST['fax']);
  $shipping_address = trim($_POST['shipping_address']);
  $billing_address = trim($_POST['billing_address']);
  $business_name = trim($_POST['business_name']);
  $secoundry_email = trim($_POST['secoundry_email']);
  $vat = trim($_POST['vat']);
  $resgistration_number = trim($_POST['resgistration_number']);
  $image   = trim($_FILES['image']['name']);
  $created_date  = date("Y-m-d H:i:s");
  $modified_date = date("Y-m-d H:i:s");
  $currency_id  = trim($_POST['currency_id']);


  try

  { 

  if(empty($image)){

   $stmt = $db_con->prepare("INSERT INTO customers (currency_id,email,password,first_name,last_name,city,state,country,zip,phone,cellphone,fax,shipping_address,billing_address,business_name,secoundry_email,vat,resgistration_number,is_active,created_date,modified_date) VALUES(:currency_id,:email,:password,:first_name,last_name,:city,:state,:country,:zip,:phone,:cellphone,:fax,:shipping_address,:billing_address,:business_name,:secoundry_email,:vat,:resgistration_number,:is_active,:created_date,:modified_date)");
   $stmt->execute(array(":currency_id"=>$currency_id,":email"=>$email,":password"=>$password,":first_name"=>$first_name,":last_name"=>$last_name,":city"=>$city,":state"=>$state,":country"=>$country,":zip"=>$zip,":phone"=>$phone,":cellphone"=>$cellphone,":fax"=>$fax,":shipping_address"=>$shipping_address,":billing_address"=>$billing_address,":business_name"=>$business_name,":secoundry_email"=>$secoundry_email,":vat"=>$vat,":resgistration_number"=>$resgistration_number,":is_active"=>0,":created_date"=>$created_date,":modified_date"=>$modified_date));
     // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // $to = "{$email}";
    //      $subject = 'Acount Confirmation';
         
    //      $message = "<h2>Congratulations {$first_name}</h2>";
    //      $message .= "<p>Your account has been successfully confirmed,please visit the following link to login.</p>";
    //      $message .= "<p>Username: {$email}</p>";
    //      $message .= "<p>Password: {$user_password}</p>";

    //      $message .= "<p><a href='trade.thefitness.co.uk/login'></a></p>";
    //      $message .= "<p>Please be noted that our trade hours are Monday to Friday, 9.00AM - 5.00PM UTC.</p>";
    //      $message .= "<p>Warm Regards</p>";
    //      $message .= "<p>Team Business Team</p>";
    //      $message .= "<p>RDX</p>";
    //      $message .= "<p>Email:trade@rdxsports.com</p>";
    //      $message .= "<p>Phone: +44 (0) 161 660 8876</p>";

    //      $headers = 'To:'.$first_name  ."\r\n";
    //      $header .= 'From:RDX SPORT <trade@rdxsports.com>' ."\r\n";
    //      $header .= 'Cc:trade@rdxsports.com' ."\r\n";
    //      $header .= 'MIME-Version: 1.0' ."\r\n";
    //      $header .= 'Content-type: text/html' ."\r\n";
         
    //      $retval = mail ($to,$subject,$message,$header);
         
    //      if( $retval == true ) {
    //         header("location:customers.php");
    //      }else {
    //         echo "Message could not be sent...";
    //      }

   header("location:customers.php");
     

  }
    else{
   $uploads_dir = 'assets/images/users/';
   $target_file = $uploads_dir . basename($_FILES["image"]["name"]);
   $tmp_name = $_FILES["image"]["tmp_name"];
   //$img_name = $_FILES["image"]["name"];
   move_uploaded_file($tmp_name, $target_file);

   $stmt = $db_con->prepare("INSERT INTO customers (currency_id,email,password,first_name,last_name,city,state,country,zip,phone,cellphone,fax,shipping_address,billing_address,business_name,secoundry_email,vat,resgistration_number,image,is_active,created_date,modified_date) VALUES(:currency_id,:email,:password,:first_name,:last_name,:city,:state,:country,:zip,:phone,:cellphone,:fax,:shipping_address,:billing_address,:business_name,:secoundry_email,:vat,:resgistration_number,:image,:is_active,:created_date,:modified_date)");
   $stmt->execute(array(":currency_id"=>$currency_id,":email"=>$email,":password"=>$password,":first_name"=>$first_name,":last_name"=>$last_name,":city"=>$city,":state"=>$state,":country"=>$country,":zip"=>$zip,":phone"=>$phone,":cellphone"=>$cellphone,":fax"=>$fax,":shipping_address"=>$shipping_address,":billing_address"=>$billing_address,":business_name"=>$business_name,":secoundry_email"=>$secoundry_email,":vat"=>$vat,":resgistration_number"=>$resgistration_number,":image"=>$image,":is_active"=>0,":created_date"=>$created_date,":modified_date"=>$modified_date));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   header("location:customers.php");

    }
   
  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>