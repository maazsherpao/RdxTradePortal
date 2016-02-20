<?php
require_once 'config.php';
if($_POST['id'])
{
	 $id = trim($_POST['id']);
	 $stmt = $db_con->prepare("UPDATE  admin SET is_active = :is_active WHERE id=:id");
     $stmt->execute(array(":is_active"=>1,":id"=>$id));


}
?>