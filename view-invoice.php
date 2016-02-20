<?php  
session_start();
//if(!isset($_SESSION['user_session'])) {header('location:login.php');}
// if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}
// if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}

?>
<!-- ========== Get Page Header ========== -->
<?php include_once('header.php');require 'config.php'; ?>



<!-- ========== Left Sidebar Start ========== -->
<?php include_once('sidebar.php');
$userID = $_GET['id'];
?>
<!-- Left Sidebar End -->



<?php if(!isset($_SESSION['user_session'])) {header('location:login.php');}?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
<!-- Start content -->
<div class="content">
<div class="container">

<!-- Page-Title -->
<div class="row">
<div class="col-sm-12">
<h4 class="page-title">Invoice</h4>
<ol class="breadcrumb">
<li><a href="product.php">Products</a></li>
<li><a href="orders.php">Orders</a></li>
<li class="active">Invoice</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<!-- <div class="panel-heading">
<h4>Invoice</h4>
</div> -->
<div class="panel-body">
<div class="clearfix">
<div class="pull-left">
<h4 class="text-right"><img src="assets/images/logonew.png" alt="velonic"></h4>

</div>
<div class="pull-right">
<h4>Invoice # <br>
<strong><?php echo $userID;?></strong>
</h4>
</div>
</div>
<hr>
<div class="row">
<div class="col-md-12">

<div class="pull-left m-t-30">
<address>
<strong>RDX SPORTS Inc.</strong><br>
Unit B3, Fernhill Mill<br>
Hornby St, Bury BL9 5BL<br>
United Kingdom
</address>
</div>
<div class="pull-right m-t-30">
<!-- <p><strong>Order Date: </strong> Jun 15, 2015</p>
 --><p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
<p class="m-t-10"><strong>Order ID: </strong> #<?php echo $userID;?></p>
</div>
</div>
</div>
<div class="m-h-50"></div>
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table m-t-30">
<thead>
<tr><th>#</th>
<th>Item</th>
<th>Size</th>
<th>Quantity</th>
<th>Unit Cost</th>
<th>Total</th>
</tr></thead>
<tbody>
<?php 

$number = 1;
$total = 0;
$stmt = $db_con->prepare("SELECT * FROM orders WHERE invoice_no = :id");
$stmt->execute(array(":id"=>$userID));
$rows = $stmt->fetchall(PDO::FETCH_ASSOC);



foreach ($rows as $row) {


?>
<tr>
<td><?php echo $number;?></td>
<?php
$stmt12 = $db_con->prepare("SELECT title,trade_price FROM products WHERE id = :id");
$stmt12->execute(array(":id"=>$row['product_id']));
$result = $stmt12->fetch(PDO::FETCH_ASSOC);

?>
<td><?php echo $result['title'];?></td>
 <?php
	 $currencyCus = $db_con->prepare("SELECT * FROM customer_currency WHERE id = :id");
	$currencyCus->execute(array(":id"=>$row['currency_id']));
	$cusRows = $currencyCus->fetch(PDO::FETCH_ASSOC);


	$CurrencyTitle = strtoupper($cusRows['currency']);
	$CurrencyValue = $cusRows['value'];
	?>

<?php
$getProductSize = $db_con->prepare("SELECT size FROM product_sizes WHERE id = :id");
$getProductSize->execute(array(":id"=>$row['product_sizes_id']));
$getSizeTitle = $getProductSize->fetch(PDO::FETCH_ASSOC);

?>

	<td>
<?php echo $getSizeTitle['size'];?>
</td>

<td>
<?php echo $row['quantity'];?>
</td>
<?php
 if(!empty($CurrencyValue) && !empty($CurrencyTitle))
    {
   
?>
<td><?php echo $CurrencyTitle;?> <?php echo round($result['trade_price'] * $CurrencyValue,2);?></td>
<td><?php echo $CurrencyTitle;?> <?php echo round($row['amount'] * $CurrencyValue,2);?></td>
<?php } else {?>
<td>$ <?php echo round($result['trade_price'],2);?></td>
<td>$ <?php echo round($row['amount'],2);?></td>

<?php } ?>
</tr>
<?php $number++;$total += $row['amount'];} ?>

</tbody>
</table>
</div>
</div>
</div>
<div class="row" style="border-radius: 0px;">
<div class="col-md-3 col-md-offset-9">
<?php
if(!empty($CurrencyTitle) && !empty($CurrencyValue)){
?>
<p class="text-left"><b>Sub-total:</b> <?php echo $CurrencyTitle;?> <?php echo round($total*$CurrencyValue,2);?></p>
<?php } else{?>
<p class="text-left"><b>Sub-total:</b> $ <?php echo round($total,2);?></p>

<?php } ?>
<?php 
$queryDetails = $db_con->prepare("SELECT total_price,vat,ship,discount FROM order_detail WHERE invoice_no = :invoice_no");
$queryDetails->execute(array(":invoice_no"=>$userID));
$resultsFetch = $queryDetails->fetch(PDO::FETCH_ASSOC);
?>
<p class="text-left">Discout: <?php if($resultsFetch['discount'] == 0) echo "0"; else echo $resultsFetch['discount']; ?>%</p>
<p class="text-left">VAT: <?php if($resultsFetch['vat'] == 0) echo "0"; else echo $resultsFetch['vat']; ?>%</p>
<p class="text-left">Shipment: <?php echo $CurrencyTitle;?> <?php if($resultsFetch['ship'] == 0) echo "0"; else echo $resultsFetch['ship']; ?></p>
<hr>
<?php
if(!empty($CurrencyTitle) && !empty($CurrencyValue)){
	$newPriceValue = $resultsFetch['total_price']*$CurrencyValue;
?>
<h3 class="text-left">Price <?php echo $CurrencyTitle;?> <?php echo round($resultsFetch['total_price'],2);?></h3> 
<?php } else{?>
<h3 class="text-left">Price $ <?php echo round($resultsFetch['total_price'],2);?></h3> 

<?php } ?>

</div>
</div>
<hr>
<div class="hidden-print">
<div class="pull-right">
<!--  <a href="#" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>-->
<a href="submit_order.php?id=<?php echo $userID;?>" class="btn btn-primary waves-effect waves-light">Submit</a> 
</div>
</div>
</div>
</div>

</div>

</div>

</div> <!-- container -->

</div> <!-- content -->

<!-- ========== Footer ========== -->
<?php include_once('footer.php');?>
<!-- Footer End -->

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->

<script>
var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>


<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>