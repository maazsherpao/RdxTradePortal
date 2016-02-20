<?php
session_start();
ob_start();
//error_reporting(0);
require 'config.php';
 

 if(!isset($_SESSION['customer_id'])) {header('location:login.php');}
// product details
$id = isset($_GET['id']) ?  $_GET['id'] : die;
$name = isset($_GET['name']) ?  $_GET['name'] : die;
$quantity  = isset($_GET['quantity']) ?  $_GET['quantity'] : die;
$weight    = isset($_GET['weight']) ?  $_GET['weight'] : die;
$user_id=$_SESSION['customer_id'];
$created_date=date('Y-m-d H:i:s');
$modified_date=date('Y-m-d H:i:s');
//$price = 22;

$check = $db_con->prepare("SELECT * FROM cart_items WHERE product_sizes_id = :id");
$check->execute(array(":id"=>$weight));
$rowsProduct = $check->fetch(PDO::FETCH_ASSOC);
$rquantity = $rowsProduct['quantity'];
$cartID   = $rowsProduct['id'];
$newquantity = $rquantity+$quantity;
$count = $check->rowCount();
if($count>0){
    $update = $db_con->prepare("UPDATE cart_items SET quantity = :quantity WHERE id = :id");
    $update->execute(array(":quantity"=>$newquantity,"id"=>$cartID));
	header("Location:customer.php?action=added&id=" . $id . "&name=" . $name);

} else {
// insert query
 $stmt = $db_con->prepare("INSERT INTO cart_items (product_id,customer_id,product_sizes_id,quantity,created_date,modified_date) VALUES (:product_id,:customer_id,:product_sizes_id,:quantity,:created_date,:modified_date)");
 
// if database insert succeeded
if($stmt->execute(array(":product_id"=>$id,":customer_id"=>$user_id,":product_sizes_id"=>$weight,":quantity"=>$quantity,":created_date"=>$created_date,":modified_date"=>$modified_date))){
    header("Location:customer.php?action=added&id=" . $id . "&name=" . $name);
}
 
// if database insert failed
else{
     header('Location:customer.php?action=failed&id=' . $id . '&name=' . $name);
}

}
 
?>