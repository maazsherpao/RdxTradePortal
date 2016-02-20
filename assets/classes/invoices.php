<?php

/**
* Author  : Muhammad Maaz
* Project : RDX Online Trade Portal
*/
require("config.php");
//require_once $_SERVER['DOCUMENT_ROOT'].'/light/config.php';
class Invoices
{
	private $con;

    public function __construct(connection $db_con) {
        $this->con = $db_con;
    }

		
	public function getProductNameById($id)
	{
		$id    = $id;
		$query = $this->con->prepare("SELECT title FROM products WHERE id=:id ");
		$query->execute(array(":id"=>$id));
		$row   = $query->fetch(PDO::FETCH_ASSOC);
		return $row['title']; 
	}
}

$invoicesObject = new Invoices();




?>