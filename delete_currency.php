<?php
require_once 'config.php';
if($_POST['id'])
{
	 $id = trim($_POST['id']);
	 $stmt = $db_con->prepare("DELETE FROM customer_currency WHERE id=:id");
     $stmt->execute(array(":id"=>$id));


}
?>