<?php
 require_once 'config.php';

 if(isset($_POST['btn']))

 {


  $array1 = $_POST['sizes'];
  $array2 = $_POST['quantity'];
  $array3 = $_POST['sizeID'];
  $product_category_id = trim($_POST['product_category_id']);
  $title = trim($_POST['title']);
  $price = trim($_POST['price']);
  $trade_price = trim($_POST['trade_price']);
  $sku = trim($_POST['sku']);
  $image   = trim($_FILES['image']['name']);
  $created_date  = date("Y-m-d H:i:s");
  $modified_date = date("Y-m-d H:i:s");
  $weight = trim($_POST['weight']);
  $description = trim($_POST['description']);
  $quantity = trim($_POST['quantity']);
  $out_of_stock = 0;
  $adminID = trim($_POST['btn']);
  
 
  try
  { 
  
  	if(empty($image)){

   $stmt = $db_con->prepare("UPDATE products SET product_category_id=:product_category_id,title=:title,sku=:sku,price=:price,trade_price=:trade_price,weight=:weight,description=:description,quantity=:quantity,out_of_stock=:out_of_stock,modified_date=:modified_date WHERE id =:id");
   $stmt->execute(array("product_category_id"=>$product_category_id,"title"=>$title,"sku"=>$sku,"price"=>$price,":trade_price"=>$trade_price,":weight"=>$weight,":description"=>$description,":quantity"=>$quantity,":out_of_stock"=>0,":modified_date"=>$modified_date,":id"=>$adminID));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //$lastID = $db_con->lastInsertId();
    for($i=0; $i<count($array1); $i++) {

     $stmt = $db_con->prepare("UPDATE product_sizes SET size = :size,quantity = :quantity WHERE id = :id");
     $stmt->execute(array(":size"=>$array1[$i],":quantity"=>$array2[$i],":id"=>$array3[$i]));

     }
   header("location:product.php");

  
  	}
  	else{

   $uploads_dir = 'assets/images/products/';
   $target_file = $uploads_dir . basename($_FILES["image"]["name"]);
   $tmp_name = $_FILES["image"]["tmp_name"];
   //$img_name = $_FILES["image"]["name"];
   move_uploaded_file($tmp_name, $target_file);

   $stmt = $db_con->prepare("UPDATE products SET product_category_id=:product_category_id,title=:title,sku=:sku,price=:price,trade_price=:trade_price,weight=:weight,description=:description,quantity=:quantity,image=:image,out_of_stock=:out_of_stock,modified_date=:modified_date WHERE id =:id");
   $stmt->execute(array("product_category_id"=>$product_category_id,"title"=>$title,"sku"=>$sku,"price"=>$price,":trade_price"=>$trade_price,":weight"=>$weight,":description"=>$description,":quantity"=>$quantity,":image"=>$image,":out_of_stock"=>0,":modified_date"=>$modified_date,":id"=>$adminID));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);

   for($i=0; $i<count($array1); $i++) {

     $stmt = $db_con->prepare("UPDATE product_sizes SET size=:size,quantity=:quantity WHERE id = :id");
     $stmt->execute(array(":size"=>$array1[$i],":quantity"=>$array2[$i],":id"=>$array3[$i]));

     }

   header("location:product.php");

  	}
  
  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>