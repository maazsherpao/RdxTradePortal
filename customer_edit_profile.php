            <?php  
            // session_start();
             //if(!isset($_SESSION['user_session'])) {header('location:login.php');}
            // if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}
            // if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}

             ?>
             <!-- ========== Get Page Header ========== -->
            <?php include_once('header.php'); ?>
            
            <!-- ========== Left Sidebar Start ========== -->
            <?php include_once('sidebar-customers.php');?>
            <!-- Left Sidebar End -->


         
            <?php if(!isset($_SESSION['customer_id'])) {header('location:login.php');}?>
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
                                <h4 class="page-title">Edit Profile</h4>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="customer-profile.php">Profile</a></li>
                                    <li class="active">Edit Profile</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
							<div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Edit Profile</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                    Please fill the form to edit your profile.
	                                </p>
                  <!-- <?php
                $customerID = $_SESSION['customer_id'];
                $stmt = $db_con->prepare("SELECT * FROM customers WHERE id = :id");
                $stmt->execute(array(":id"=>$customerID));
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $stmt->rowCount(); 
               
                ?> -->
		                                        
									<form action="check-customer-profile-edit.php" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
										
									 <?php
                   $adminID = $_SESSION['customer_id'];
                   $stmt = $db_con->prepare("SELECT * FROM customers WHERE id = $adminID");
                   $stmt->execute();
                   $drow = $stmt->fetch(PDO::FETCH_ASSOC);
                   $count = $stmt->rowCount(); 
                                         
                   ?>

                     <div class="form-group">

                    <label for="currency_id">Select Currency</label>
                    <select name="currency_id" class="form-control">
                    <?php
                    $stmt12 = $db_con->prepare("SELECT * FROM customer_currency");
                    $stmt12->execute();
                    $rows = $stmt12->fetchall(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
                    
                    ?>
                    <option value="<?php echo $row['id'];?>" <?php if($drow['currency_id'] == $row['id'] ) echo "selected=selected";?>><?php echo $row['currency'];?></option>

                    <?php } ?>
                    </select>
                     </div>

                     <div class="form-group">

                     <label for="email">Email Address *</label>
                     <input type="email" value="<?php echo $drow['email'];?>" name="email" parsley-trigger="change" required placeholder="Enter email address" class="form-control" id="email">
                      
                     </div>

                    
                    <div class="form-group">

                      <label for="first_name">First Name *</label>

                      <input type="text" value="<?php echo $drow['first_name'];?>" name="first_name" parsley-trigger="change" required placeholder="Enter customer's first name" class="form-control" id="name">

                    </div>

                    <div class="form-group">

                      <label for="last_name">Last Name </label>

                      <input type="text" value="<?php echo $drow['last_name'];?>" name="last_name" parsley-trigger="change"  placeholder="Enter customer's last name" class="form-control" id="name">

                    </div>

                    <div class="form-group">

                      <label for="city">Customer City *</label>

                      <input type="text" value="<?php echo $drow['city'];?>" name="city" parsley-trigger="change" required placeholder="Enter customer city name" class="form-control" id="city">

                    </div>

                    <div class="form-group">

                      <label for="state">Customer State *</label>

                      <input id="state" name="state" value="<?php echo $drow['state'];?>" type="text" placeholder="Enter customer state name" required class="form-control">

                    </div>

                    <div class="form-group">

                      <label for="country">Customer Country *</label>

                      <input id="country" name="country" value="<?php echo $drow['country'];?>" type="text" placeholder="Enter customer country name" required class="form-control">

                    </div>

                    <div class="form-group">

                      <label for="zip">Zip *</label>

                      <input  type="text" value="<?php echo $drow['zip'];?>" required placeholder="Enter zip code" class="form-control" name="zip" id="zip">

                    </div>

                    <div class="form-group">

                      <label for="phone">Customer Phone Number *</label>

                      <input  type="text" value="<?php echo $drow['phone'];?>" required placeholder="Enter customer phone number" class="form-control" name="phone" id="phone">

                    </div>

                    <div class="form-group">

                      <label for="cellphone">Cell Number </label>

                      <input  type="text" value="<?php echo $drow['cellphone'];?>" placeholder="Enter customer cell number" class="form-control" name="cellphone" id="cellphone">

                    </div>

                    <div class="form-group">

                      <label for="fax">Fax Number </label>

                      <input  type="text" value="<?php echo $drow['fax'];?>" placeholder="Enter customer fax number" class="form-control" name="fax" id="fax">

                    </div>

                     <div class="form-group">

                      <label for="shipping_address">Customer's Shipping Address*</label>

                      <textarea name="shipping_address" required class="form-control" id="shipping_address"><?php echo $drow['shipping_address'];?></textarea>

                    </div>

                     <div class="form-group">

                      <label for="billing_address">Customer's Billing Address*</label>

                      <textarea name="billing_address"  required class="form-control" id="billing_address"><?php echo $drow['billing_address'];?></textarea>

                    </div>

                     <div class="form-group">

                      <label for="business_name">Customer's Business Name* </label>

                      <input  type="text" value="<?php echo $drow['business_name'];?>" placeholder="Enter customer's business name" required class="form-control" name="business_name" id="business_name">

                    </div>

                    <div class="form-group">

                      <label for="secoundry_email">Secoundry Email</label>

                      <input  type="text" value="<?php echo $drow['secoundry_email'];?>" placeholder="Enter customer's secoundry email" class="form-control" name="secoundry_email" id="secoundry_email">

                    </div>

                    <div class="form-group">

                      <label for="vat">Customer's VAT</label>

                      <input  type="text" value="<?php echo $drow['vat'];?>" placeholder="Enter customer's vat" class="form-control" name="vat" id="vat">

                    </div>

                    <div class="form-group">

                      <label for="resgistration_number">Customer's Registration No</label>

                      <input  type="text" value="<?php echo $drow['resgistration_number'];?>" placeholder="Enter customer's Reg No" class="form-control" name="resgistration_number" id="resgistration_number">

                    </div>

                  

                   <div class="form-group">
                          <div class="img"><img src="assets/images/users/<?php echo $drow['image'];?>" alt="Customer's Image" width="100"></div>
                            <label class="control-label">Customer Image</label>
                            <input type="file" name="image">
                            
                           
                          </div>
										<!-- <div class="form-group">
											<div class="checkbox">
												<input id="remember-1" type="checkbox">
												<label for="remember-1"> Remember me </label>
											</div>
										</div> -->

										<div class="form-group text-left m-b-0">
                     <input type="hidden" name="btn" value="<?php echo $adminID;?>">
											<button class="btn btn-primary waves-effect waves-light" type="submit">
												Update Profile
											</button>
											<button type="reset" class="btn btn-default waves-effect waves-light m-l-5" onclick="location.href='customer-profile.php'">
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