<?php  

             session_start();

             if(!isset($_SESSION['user_session'])) {header('location:login.php');}

             // if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}

             // if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}

             require_once 'config.php';

             ?>

             <!-- ========== Get Page Header ========== -->

            <?php include_once('header.php'); ?>

            

            <!-- ========== Left Sidebar Start ========== -->

            <?php include_once('sidebar.php');?>

            <!-- Left Sidebar End -->





         



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

                                <h4 class="page-title">Edit Order</h4>

                                <ol class="breadcrumb">

                                    <li><a href="index.php">Home</a></li>

                                    <li><a href="orders.php">Order</a></li>

                                    <li class="active">Edit Order</li>

                                </ol>

                            </div>

                        </div>

                        

                        <div class="row">

							<div class="col-lg-12">

								<div class="card-box">

									<h4 class="m-t-0 header-title"><b>Edit Order</b></h4>

									<p class="text-muted font-13 m-b-30">
	                Please fill the form to edit product.
	                </p>
		                                         
                   
									<form method="post" action="edit_order_user.php" class="form-horizontal" enctype="multipart/form-data" id="form-signin">
                  <?php
                   $adminID = $_GET['id'];
                   $stmt = $db_con->prepare("SELECT * FROM order_detail WHERE invoice_no = :id");
                   $stmt->execute(array(":id"=>$adminID));
                   $drow = $stmt->fetch(PDO::FETCH_ASSOC);
                   $count = $stmt->rowCount(); 
                                         
                   ?>
										
                    <div class="form-group">

                      <label for="title">Total Quantity *</label>

                      <input type="text" name="total_quantity" parsley-trigger="change" required placeholder="Enter product quantity" class="form-control" id="title" value="<?php echo $drow['total_quantity'];?>" readonly>

                    </div>

                    <div class="form-group">
                    <?php
                    $currencyCus = $db_con->prepare("SELECT * FROM customer_currency WHERE id = :id");
                    $currencyCus->execute(array(":id"=>$drow['currency_id']));
                    $cusCurrencyTitle = $currencyCus->fetch(PDO::FETCH_ASSOC);

                    $CurrencyTitle = strtoupper($cusCurrencyTitle['currency']);
                    $CurrencyValue = $cusCurrencyTitle['value'];
                    $newPriceValue = $drow['total_price']*$CurrencyValue;

                    ?>

                      <label for="emailAddress">Total Price *</label>

                      <input type="text" name="total_price" parsley-trigger="change" required placeholder="Enter Product SKU" class="form-control" id="sku" value="<?php echo round($newPriceValue,2);?>">

                    </div>

                    <div class="form-group">

                      <label for="price">Add VAT </label>

                      <input id="vat" name="vat" type="text" placeholder="Enter VAT eg 10 (% will be added automatically)"  class="form-control" value="<?php echo $drow['vat'];?>">

                    </div>

                    <div class="form-group">

                      <label for="passWord2">Add Shippment *</label>

                      <input  type="text" required placeholder="Enter Shippment price eg 20 ($ will be added automatically)" class="form-control" name="ship" id="ship" value="<?php echo $drow['ship'];?>">

                    </div>

                    <div class="form-group">

                      <label for="passWord2">Discount</label>

                      <input  type="text"  placeholder="Enter Discount if any? (% will be added automatically)" class="form-control" name="discount" id="discount" value="<?php echo $drow['discount'];?>">

                    </div>

                   <!--  <div class="form-group">

                      <label for="city">Product Description *</label>

                      <textarea name="description" class="form-control" id="description"><?php echo $drow['description'];?></textarea>

                    </div>

                    <div class="form-group">

                      <label for="quantity">Product Quantity *</label>

                      <input type="text" required placeholder="Enter Product Quantity" name="quantity" class="form-control" id="quantity" value="<?php echo $drow['quantity'];?>">

                    </div> -->

                    



                    <!-- <div class="form-group">

                      <label for="country">Type *</label>

                      <select name="type">

                        <option value="super">Super Admin</option>

                        <option value="admin">Admin</option>

                        option

                      </select>



                    </div> 

                    <div class="form-group">

                      <label for="passWord2">Zip *</label>

                      <input name="zip" type="text" required placeholder="Enter Zip Code" class="form-control" id="zip">

                    </div>

                    <div class="form-group">

                      <label for="phone">Phone Number *</label>

                      <input name="phone" type="text" required placeholder="Enter Phone Number" class="form-control" id="phone">

                    </div>-->



                   <!-- <div class="form-group">
                          <div class="img"><img src="assets/images/products/<?php //echo $drow['image'];?>" alt="Product Avatar" width="100"></div>
                            <label class="control-label">Avatar</label>
                            <input type="file" name="image">
                            
                           
                          </div> -->

                    <!-- <div class="form-group">

                      <div class="checkbox">

                        <input id="remember-1" type="checkbox">

                        <label for="remember-1"> Remember me </label>

                      </div>

                    </div> -->


										<div class="form-group text-left m-b-0">
                    <input type="hidden" name="btn" value="<?php echo $adminID;?>">
 
											<button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">

												Edit Order

											</button>

											<button type="reset" class="btn btn-default waves-effect waves-light m-l-5" onclick="location.href='orders.php'">

												Cancel

											</button>

										</div>

										

									</form>
                  

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

        

        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js" type="text/javascript"></script>

        <script src="assets/js/jquery.core.js"></script>

        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="assets/plugins/parsleyjs/dist/parsley.min.js"></script>
        <script type="text/javascript">

			$(document).ready(function() {

				$('form').parsley();

			});

		</script>





	</body>

</html>