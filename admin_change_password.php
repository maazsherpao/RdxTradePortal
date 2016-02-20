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
                                <h4 class="page-title">Change Password</h4>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li class="active">Change Password</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
              <div class="col-lg-12">
              <div id="error">
             
               </div>
                <div class="card-box">
                  <h4 class="m-t-0 header-title"><b>Change Password</b></h4>
                  <p class="text-muted font-13 m-b-30">
                                      Please fill the form to change your password.
                                  </p>
                                            
                  <form action="customer-password-change-process.php" method="post" id="customer-change-password" class="form-horizantle">
                    <div class="form-group">
                      <label for="userName">Old Password*</label>
                      <input type="password" name="old_password" parsley-trigger="change" required placeholder="Enter your old password" class="form-control" id="oldPassword">
                    </div>
                    <!-- <div class="form-group">
                      <label for="emailAddress">Email address*</label>
                      <input type="email" name="email" parsley-trigger="change" required placeholder="Enter email" class="form-control" id="emailAddress">
                    </div> -->
                    <div class="form-group">
                      <label for="pass1">New Password*</label>
                      <input id="pass1" type="password" name="new_password" placeholder="Password" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="passWord2">Confirm New Password *</label>
                      <input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" id="passWord2">
                    </div>
                   <!--  <div class="form-group">
                      <div class="checkbox">
                        <input id="remember-1" type="checkbox">
                        <label for="remember-1"> Remember me </label>
                      </div>
                    </div> -->

                    <div class="form-group text-left m-b-0">
                    <input type="hidden" name="btn-customer-change-password">
                      <button class="btn btn-primary waves-effect waves-light" id="customer-change-password-form" type="submit">
                        Change Password
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
          $(".form-horizantle").submit(function(event) {
            
             var data = $("#customer-change-password").serialize();
                       
                       $.ajax({
                        
                       type : 'POST',
                       url  : 'admin-password-change-process.php',
                       data : data,
                       beforeSend: function()
                       { 
                        $("#error").fadeOut();
                        $("#customer-change-password-form").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; validating ...');
                       },
                       success :  function(response)
                          {  

                         if(response=="ok"){
                             
                          $("#customer-change-password-form").html('Password Changed Successfully ...');
                          setTimeout(' window.location.href = "profile.php"; ',4000);
                         }
                         else{
                             
                          $("#error").fadeIn(1000, function(){      
                          $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                               $("#btn-admin-form").html('Change Password');
                             });
                         }
                         }
                       });
                        return false;
                      
                        /* login submit */

           
          });
      });
    </script>


  </body>
</html>