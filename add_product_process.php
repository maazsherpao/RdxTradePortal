<?php
 require_once 'config.php';

 if(isset($_POST['btn']))

 {

  $array1 = $_POST['sizes'];
  $array2 = $_POST['quantity'];
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
  


  try

  { 

  

  if(empty($image)){

   $stmt = $db_con->prepare("INSERT INTO products (product_category_id,title,sku,price,trade_price,weight,description,quantity,out_of_stock,created_date,modified_date) VALUES(:product_category_id,:title,:sku,:price,trade_price=:trade_price,:weight,:description,:quantity,:out_of_stock,:created_date,:modified_date)");
   $stmt->execute(array("product_category_id"=>$product_category_id,"title"=>$title,"sku"=>$sku,"price"=>$price,":trade_price"=>$trade_price,":weight"=>$weight,":description"=>$description,":quantity"=>$quantity,":out_of_stock"=>0,":created_date"=>$created_date,":modified_date"=>$modified_date));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $lastID = $db_con->lastInsertId();

   for($i=0; $i<count($array1); $i++) {

     $stmt = $db_con->prepare("INSERT INTO product_sizes (product_id,size,quantity,created_date,modified_date) VALUES(:product_id,:size,:quantity,:created_date,:modified_date)");
     $stmt->execute(array("product_id"=>$lastID,"size"=>$array1[$i],"quantity"=>$array2[$i],":created_date"=>$created_date,":modified_date"=>$modified_date));

     }
   header("location:product.php");

  
    }
    else{
   $uploads_dir = 'assets/images/products/';
   $target_file = $uploads_dir . basename($_FILES["image"]["name"]);
   $tmp_name = $_FILES["image"]["tmp_name"];
   //$img_name = $_FILES["image"]["name"];
   move_uploaded_file($tmp_name, $target_file);

   $stmt = $db_con->prepare("INSERT INTO products (product_category_id,title,sku,price,trade_price,weight,description,quantity,image,out_of_stock,created_date,modified_date) VALUES(:product_category_id,:title,:sku,:price,trade_price=:trade_price,:weight,:description,:quantity,:image,:out_of_stock,:created_date,:modified_date)");
   $stmt->execute(array("product_category_id"=>$product_category_id,"title"=>$title,"sku"=>$sku,"price"=>$price,":trade_price"=>$trade_price,":weight"=>$weight,":description"=>$description,":quantity"=>$quantity,"image"=>$image,":out_of_stock"=>0,":created_date"=>$created_date,":modified_date"=>$modified_date));
  // $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $lastID = $db_con->lastInsertId();

   for($i=0; $i<count($array1); $i++) {

     $stmt = $db_con->prepare("INSERT INTO product_sizes (product_id,size,quantity,created_date,modified_date) VALUES(:product_id,:size,:quantity,:created_date,:modified_date)");
     $stmt->execute(array("product_id"=>$lastID,"size"=>$array1[$i],"quantity"=>$array2[$i],":created_date"=>$created_date,":modified_date"=>$modified_date));

     }
   header("location:product.php");

    }
   
  }

  catch(PDOException $e){

   echo $e->getMessage();

  }

 }



?>