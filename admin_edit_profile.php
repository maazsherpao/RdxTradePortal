           <?php  
             session_start();
             if(!isset($_SESSION['user_session'])) {header('location:login.php');}
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
                                <h4 class="page-title">Edit Profile</h4>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="profile.php">Profile</a></li>
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
                  <?php
                $customerID = $_SESSION['user_session'];
                $stmt = $db_con->prepare("SELECT * FROM admin WHERE id = :id");
                $stmt->execute(array(":id"=>$customerID));
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $stmt->rowCount(); 
               
                ?>
		                                        
									<form action="check-admin-profile-edit.php" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
										
										<div class="form-group">
                      <label for="name">Name *</label>
                      <input id="name" name="name" value="<?php echo $rows['name'];?>" type="text" placeholder="Enter Name" required class="form-control">
                    </div>

                    <div class="form-group">
											<label for="city">City *</label>
											<input id="city" name="city" value="<?php echo $rows['city'];?>" type="text" placeholder="Enter City Name" required class="form-control">
										</div>
                    
                    
										<div class="form-group">
											<label for="country">Country *</label>
											<input  type="text" name="country" value="<?php echo $rows['country'];?>" required placeholder="Enter Country Name" class="form-control" id="country">
										</div>
                    
                    <div class="form-group">
                      <label for="phone">Phone Number *</label>
                      <input name="phone" type="text" value="<?php echo $rows['phone'];?>" required placeholder="Enter Phone Number" class="form-control" id="phone">
                    </div>
                    
                    <?php if(!empty($rows['image'])){?>
                    <div class="img"><img src="assets/images/users/<?php echo $rows['image'];?>" width="50" alt="Customer Avatar"></div>
                   <?php } else{?>
                   <div class="img"><img src="assets/images/no-photo.gif" width="50" alt="Customer Avatar"></div>
                   <?php }?>
                   <div class="form-group">
                            <label class="control-label">Avatar</label>
                            
                            <input type="file" name="image">
                          </div>
										<!-- <div class="form-group">
											<div class="checkbox">
												<input id="remember-1" type="checkbox">
												<label for="remember-1"> Remember me </label>
											</div>
										</div> -->

										<div class="form-group text-left m-b-0">
                    <input type="hidden" name="btn-admin-edit">
											<button class="btn btn-primary waves-effect waves-light" type="submit">
												Update Profile
											</button>
											<button type="reset" class="btn btn-default waves-effect waves-light m-l-5" onclick="location.href='profile.php'">
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