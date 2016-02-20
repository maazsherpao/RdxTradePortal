<?php

include 'header.php';
include 'sidebar-customers.php';

// connect to database
include 'config.php';
include 'functions.php';


$userID = $_SESSION['customer_id'];

$currID = $_SESSION['currID'];



$cusCurrencyID = $db_con->prepare("SELECT currency_id FROM customers WHERE id = :id");
$cusCurrencyID->execute(array(":id"=>$userID));
$ci = $cusCurrencyID->fetch(PDO::FETCH_ASSOC);

$getCurrency = $db_con->prepare("SELECT * FROM customer_currency WHERE id = :id");
$getCurrency->execute(array(":id"=>$ci['currency_id']));
$getResult = $getCurrency->fetch(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($getResult);
// exit;

$symbol = $getResult['currency'];
$valueC = $getResult['value'];
if(empty($symbol)) { $symbol = '&#36;';}
if(empty($valueC)) {$valueC = 1;}

// page headers
$page_title="Products";
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;
 
$per_page = 10; // Set how many records do you want to display per page.
 
$startpoint = ($page * $per_page) - $per_page;
 
$statement = "products ORDER BY created_date DESC"; // Change `records` according to your table name.
 
// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "1";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "1";
 ?>
 <div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                               <div class="col-sm-10 pull-left">
                                   
                                    <h4 class="page-title">Products</h4>
                                 <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Products</li>
                                </ol>
                               </div>

                             
                                
                            </div>
                        </div>

                        <div class="panel">

                            

                            <div class="panel-body">

                                <div class="row">
 <?php
// show message
if($action=='added'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> added to your cart!";
    echo "</div>";
}
 
else if($action=='failed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> failed to add to your cart!";
    echo "</div>";
}
else if($action=='exist'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> exist in your cart!";
    echo "</div>";
}
 
// select products from database
$query = "SELECT * FROM products
        ORDER BY created_date DESC LIMIT {$startpoint} , {$per_page}";
 
$stmt = $db_con->prepare( $query );
$stmt->execute();
 
// count number of products returned
$num = $stmt->rowCount();
 
if($num>0){
     
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";
     
        // our table heading
        echo "<tr>";
            echo "<th class='textAlignLeft'>Product</th>";
            echo "<th class='textAlignLeft'>Product Name</th>";
            echo "<th>Price ({$symbol})</th>";
            echo "<th>Trade Price ({$symbol})</th>";
            echo "<th style='width:10em;'>Weight</th>";
            echo "<th style='width:5em;'>Quantity</th>";
            echo "<th>Action</th>";
        echo "</tr>";
         
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $newPrice = $price*$valueC;
            $tradePrice = $trade_price*$valueC;
             
            //creating new table row per record
            echo "<tr>";
            echo "<td>";
                  
                    echo "<img src='assets/images/products/{$image}' style='width:50px;'>";
                echo "</td>";

                echo "<td>";
                    echo "<div class='product-id' style='display:none;'>{$id}</div>";
                    echo "<div class='product-name'>{$title}</div>";
                echo "</td>";
                echo "<td>{$symbol} " . number_format($newPrice, 2, '.' , ',') . "</td>";
                echo "<td>{$symbol} " . number_format($tradePrice, 2, '.' , ',') . "</td>";


                // if(isset($quantity)){
                //      echo "<td>";
                //     echo "<select name='weight' class='form-control' readonly";
                //     echo "<option value='10oz'>10oz</option>";
                //     echo "<option value='12oz'>12oz</option>";
                //     echo "<option value='14oz'>14oz</option>";
                //     echo "<option value='16oz'>16oz</option>";
                //     echo "</select>";
                //     echo "</td>";
                   
                //     echo "<td>";
                //              echo "<input type='text' name='quantity' value='{$quantity}' disabled class='form-control' />";
                //     echo "</td>";
                //     echo "<td>";
                //         echo "<button class='btn btn-success' disabled>";
                //             echo "<span class='glyphicon glyphicon-shopping-cart'></span> Added!";
                //         echo "</button>";
                //     echo "</td>";             
                // }else{
                $getSizes = $db_con->prepare("SELECT id,size FROM product_sizes WHERE product_id = :product_id");
                $getSizes->execute(array(":product_id"=>$id));
                $rows = $getSizes->fetchall(PDO::FETCH_ASSOC);
                // $count = $getSizes->rowCount($rows);
                // echo $count;
               
                   
                    echo "<td>";
                    echo "<select name='weight' id='weight' class='form-control'>";
                    foreach ($rows as $row) {?>
                    <option value="<?php echo $row['id']?>"><?php echo $row['size']?></option>
                    <?php }
                    echo "</select>";
                    echo "</td>";
                    echo "<td>";
                   
                             echo "<input type='number' name='quantity' min='1' value='1' class='form-control' />";
                    echo "</td>";
                    echo "<td>";
                        echo "<button class='btn btn-primary add-to-cart'>";
                            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Add to cart";
                        echo "</button>";
                    echo "</td>";
                // }
            echo "</tr>";
        }
         
    echo "</table>";
}
 
// tell the user if there's no products in the database
else{
    echo "No products found.";

}?>
<style>
    ul.pagination{margin-top: 0px !important;float: right;}
</style>
<div class="row">
<div class="col-sm-6">
<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">

</div>
</div>
<div class="col-sm-6">
<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
<?php echo pagination($db_con,$statement,$per_page,$page,$url='?');?>
</div>
</div>
</div>

<?php
 
include 'footer.php';
?>
</div></div></div></div></div></div>
<script>

            var resizefunc = [];

        </script>



        <!-- jQuery  -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/holder.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/detect.js"></script>

        <script src="assets/js/fastclick.js"></script>

        <script src="assets/js/jquery.slimscroll.js"></script>

        <script src="assets/js/jquery.blockUI.js"></script>

        <script src="assets/js/waves.js"></script>

        <script src="assets/js/wow.min.js"></script>

        <script src="assets/js/jquery.nicescroll.js"></script>

        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js" type="text/javascript"></script>

        <script src="assets/js/jquery.core.js"></script>

        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/js/holder.js"></script>
 
<script>
$(document).ready(function(){
    $('.add-to-cart').click(function(){
        var id = $(this).closest('tr').find('.product-id').text();
        var name = $(this).closest('tr').find('.product-name').text();
        var quantity = $(this).closest('tr').find('input').val();
        var weight = $(this).closest('tr').find('select').val();
        window.location.href = "add_to_cart.php?id=" + id + "&name=" + name + "&quantity=" + quantity + "&weight=" + weight;
    });
     
    $('.update-quantity').click(function(){
        var id = $(this).closest('tr').find('.product-id').text();
        var name = $(this).closest('tr').find('.product-name').text();
        var quantity = $(this).closest('tr').find('input').val();
        window.location.href = "update_quantity.php?action=quantity_updated&id=" + id + "&name=" + name + "&quantity=" + quantity;
    });

    
    $('#currencyValue').on('change', function() {
        //event.preventDefault();
        /* Act on the event */
        var currencyID = $(this).val();
         $.post("change_currency.php",
        {
          
          id: currencyID
        },
        function(data,status){
            //alert("Data: " + data + "\nStatus: " + status);
            location.reload();
        });
    });
  
});
</script>