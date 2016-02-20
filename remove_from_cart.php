<?php
session_start();
// connect to database
include 'config.php';
 
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$user_id=$_SESSION['customer_id'];
 
// delete query
$query = "DELETE FROM cart_items WHERE id=?";
 
// prepare query
$stmt = $db_con->prepare($query);
 
// bind values
$stmt->bindParam(1, $id);
//$stmt->bindParam(2, $user_id);
 
// execute query
if($stmt->execute()){
    // redirect and tell the user product was removed
    header('Location: cart.php?action=removed&id=' . $id . '&name=' . $name);
}
 
// if remove failed
else{
    // redirect and tell the user it failed
    header('Location: cart.php?action=failed&id=' . $id . '&name=' . $name);
}
?>