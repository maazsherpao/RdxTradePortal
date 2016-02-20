<?php
session_start();
ob_start();
//error_reporting(0);
require 'config.php';
 

 if(!isset($_SESSION['customer_id'])) {header('location:login.php');}
// product details
$action = isset($_GET['action']) ?  $_GET['action'] : die;
$id = isset($_GET['id']) ?  $_GET['id'] : die;
$name = isset($_GET['name']) ?  $_GET['name'] : die;
$quantity  = isset($_GET['quantity']) ?  $_GET['quantity'] : die;
$user_id=$_SESSION['customer_id'];
//$created_date=date('Y-m-d H:i:s');
//$modified_date=date('Y-m-d H:i:s');
//$price = 22;


// insert query
 $stmt = $db_con->prepare("UPDATE cart_items SET quantity = :quantity WHERE id =:id AND customer_id = :customer_id");
 
// if database insert succeeded
if($stmt->execute(array(":quantity"=>$quantity,":id"=>$id,":customer_id"=>$user_id))){
    header("Location:cart.php?action=quantity_updated&id=" . $id . "&name=" . $name);
}
 
// if database insert failed
else{
     header('Location:customer.php?action=failed&id=' . $id . '&name=' . $name);
}
 
?>