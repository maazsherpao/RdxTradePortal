<?php
// connect to database
include 'config.php';
 
// page headers
$page_title="Cart";
include 'header.php';
include 'sidebar-customers.php';
 
// parameters
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantityProduct = $_GET['quantity'];
?>
<link href="assets/css/lightbox.min.css" rel="stylesheet">
<div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Cart</h4>
                                 <ol class="breadcrumb">
                                    <li><a href="customer.php">Home</a></li>
                                    <li class="active">Cart</li>
                                </ol>
                                
                            </div>
                        </div>

                         <div class="panel">

                            

                            <div class="panel-body">

                                <div class="row">
<?php
// display a message
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}
 
else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity was updated!";
    echo "</div>";
}
 
else if($action=='failed'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity failed to updated!";
    echo "</div>";
}
 
else if($action=='invalid_value'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity is invalid!";
    echo "</div>";
}
 
// select products in the cart
$query="SELECT p.id, p.title, p.price,p.image, ci.id,ci.product_sizes_id,ci.quantity, ci.quantity * p.price AS subtotal  
            FROM cart_items ci  
                LEFT JOIN products p 
                    ON ci.product_id = p.id"; 
 
$stmt=$db_con->prepare( $query );
$stmt->execute();

// $newResult = $stmt->fetchall(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($newResult);exit;
 
// count number of rows returned
$num=$stmt->rowCount();
 
if($num>0){
     
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";
     
    // our table heading
    echo "<tr>";
        echo "<th class='textAlignLeft'>Product</th>";
        echo "<th class='textAlignLeft'>Product Name</th>";
        echo "<th class='textAlignLeft'>Weight</th>";
        echo "<th>Price (USD)</th>";
            echo "<th style='width:15em;'>Quantity</th>";
            echo "<th>Sub Total</th>";
            echo "<th>Action</th>";
    echo "</tr>";
         
    $total=0;
     
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        ?>
        <div id="demoLightbox" class="lightbox hide fade"  tabindex="-1" role="dialog" aria-hidden="true">
        <div class='lightbox-content'>
        <img src="assets/images/products/<?php echo $image; ?>">
        <div class="lightbox-caption"><p><?php echo $title;?></p></div>
    </div>
</div>
        <?php
       
        echo "<tr>";
        echo "<td>";
                      
                        echo "<a data-toggle='lightbox' href='#demoLightbox'><img src='assets/images/products/{$image}' style='width:50px;'></a>";
            echo "</td>";
            echo "<td>";
                        echo "<div class='product-id' style='display:none;'>{$id}</div>";
                        echo "<div class='product-name'>{$title}</div>";

            echo "</td>";
            echo "<td>";
             $getSizes = $db_con->prepare("SELECT size FROM product_sizes WHERE id = :id");
             $getSizes->execute(array(":id"=>$product_sizes_id));
             $rows = $getSizes->fetch(PDO::FETCH_ASSOC);
             $productSize = $rows['size'];
             echo "<div class='product-name'>{$productSize}</div>";

            echo "</td>";
            
            echo "<td>&#36;" . number_format($price, 2, '.', ',') . "</td>";
            echo "<td>";

                        echo "<div class='input-group'>";
                        if(isset($_GET['quantity'])){
                            echo "<input type='number' name='quantity' value='{$quantityProduct}' class='form-control'>";
                          }else {  
                            echo "<input type='number' name='quantity' value='{$quantity}' class='form-control'>"; 
                           }
                            echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-default update-quantity' type='button'>Update</button>";
                            echo "</span>";
                             
                        echo "</div>";
                echo "</td>";
                echo "<td>&#36;" . number_format($subtotal, 2, '.', ',') . "</td>";
                echo "<td>";
            echo "<a href='remove_from_cart.php?id={$id}&name={$title}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
            echo "</a>";
            echo "</td>";
        echo "</tr>";
             
        $total += $subtotal;
    }
     
    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
     echo "<td style='text-align:right;'><b>Total = </b></td>";
    echo "<td>&#36;" . number_format($total, 2, '.', ',') . "</td>";
    echo "<td>";
            echo "<a href='order-success.php' class='btn btn-success'>";
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Submit Order";
            echo "</a>";
    echo "</td>";
    echo "</tr>";
         
    echo "</table>";
}else{
    echo "<div class='alert alert-danger'>";
    echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
}
 
 
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
        <script src="assets/js/lightbox.min.js"></script>
 
<script>
$(document).ready(function(){
    $('.add-to-cart').click(function(){
        var id = $(this).closest('tr').find('.product-id').text();
        var name = $(this).closest('tr').find('.product-name').text();
        var quantity = $(this).closest('tr').find('input').val();
        window.location.href = "add_to_cart.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
    });
     
    $('.update-quantity').click(function(){
        var id = $(this).closest('tr').find('.product-id').text();
        var name = $(this).closest('tr').find('.product-name').text();
        var quantity = $(this).closest('tr').find('input').val();
        window.location.href = "update_quantity.php?action=quantity_updated&id=" + id + "&name=" + name + "&quantity=" + quantity;
    });

    //$('#myLightbox').lightbox();
});
</script>