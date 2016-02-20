<?php  
             session_start();
             if(!isset($_SESSION['user_session'])) {header('location:login.php');}
             if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}
             if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}

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
                                <h4 class="page-title">Edit Product Category</h4>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="products.php">Products</a></li>
                                    <li class="active">Edit Product Category</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
              <div class="col-lg-12">
                <div class="card-box">
                  <h4 class="m-t-0 header-title"><b>Edit Product Category</b></h4>
                  <p class="text-muted font-13 m-b-30">
                                      Please fill the form to edit product category.
                                  </p>
                  <?php
                   $adminID = $_GET['id'];
                   $stmt = $db_con->prepare("SELECT * FROM products_category WHERE id = $adminID");
                   $stmt->execute();
                   $drow = $stmt->fetch(PDO::FETCH_ASSOC);
                   $count = $stmt->rowCount(); 
                                         
                   ?>
                                            
                  <form action="edit_product_category_process.php" method="post">
                    <div class="form-group">
                      <label for="userName">Product Cagegory Title *</label>
                      <input type="text" name="title" parsley-trigger="change" required placeholder="Enter product category title" class="form-control" id="userName" value="<?php echo $drow['title'];?>">
                    </div>
                    <!-- <div class="form-group">
                      <label for="emailAddress">Email address *</label>
                      <input type="email" name="email" parsley-trigger="change" required placeholder="Enter email" class="form-control" id="emailAddress">
                    </div>
                    <div class="form-group">
                      <label for="pass1">Password*</label>
                      <input id="pass1" name="password" type="password" placeholder="Password" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="passWord2">Confirm Password *</label>
                      <input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" id="passWord2">
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
                            <label class="control-label">File style before button</label>
                            <input type="file" class="filestyle" data-buttonbefore="true" id="filestyle-8" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);"><div class="bootstrap-filestyle input-group"><span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-8" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choose file</span></label></span><input type="text" class="form-control " placeholder="" disabled=""> </div>
                          </div> -->
                    <!-- <div class="form-group">
                      <div class="checkbox">
                        <input id="remember-1" type="checkbox">
                        <label for="remember-1"> Remember me </label>
                      </div>
                    </div> -->

                    <div class="form-group text-left m-b-0">
                    <input type="hidden" name="btn" value="<?php echo $adminID;?>">
                      <button class="btn btn-primary waves-effect waves-light" type="submit">
                        Edit Product Category
                      </button>
                      <button type="reset" class="btn btn-default waves-effect waves-light m-l-5" onclick="location.href='product_categories.php'">
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