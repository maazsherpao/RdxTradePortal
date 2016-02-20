<?php

// echo "<pre>";
// print_r($_POST);
// exit;
require_once 'config.php';
 session_start();



if(isset($_POST))
{
	$currencyID = $_POST['id'];


	$stmt = $db_con->prepare("SELECT * FROM customer_currency WHERE id = :id");
	$stmt->execute(array(":id"=>$currencyID));
	$result = $stmt->fetch(PDO::FETCH_ASSOC);


// echo "<pre>";
// print_r($result);
// exit;




		//session_start();
		$_SESSION['symbol']  = $result['currency'];
		$_SESSION['currID']  = $result['id'];
		$_SESSION['currVal'] = $result['value'];

		

		//echo $data = array($result['currency'],$result['value']);
		echo $result['currency']."/".$result['value'];
//header('Location: customer.php');

		

	
}



?>