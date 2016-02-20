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

                                <h4 class="page-title">Edit Currency</h4>

                                <ol class="breadcrumb">

                                    <li><a href="index.php">Home</a></li>

                                    <li><a href="products.php">Currency</a></li>

                                    <li class="active">Edit Currency</li>

                                </ol>

                            </div>

                        </div>

                        

                        <div class="row">

							<div class="col-lg-12">

								<div class="card-box">

									<h4 class="m-t-0 header-title"><b>Edit Currency</b></h4>

									<p class="text-muted font-13 m-b-30">
	                Please fill the form to edit currency.
	                </p>
		                                         
                   
									<form method="post" action="edit_currency_user.php" class="form-horizontal" id="form-signin">
                  
                    <div class="form-group">

                      <label for="title">Currency *</label>

                      <input type="text" name="currency" parsley-trigger="change" required placeholder="Enter Currency Code(eg Dollar = USD)" class="form-control" id="currency" value="<?php echo $drow['currency'];?>">

                    </div>

                    <div class="form-group">

                      <label for="emailAddress">Currency Value*</label>

                      <input type="text" name="value" parsley-trigger="change" required placeholder="Enter Product SKU" class="form-control" id="sku" value="<?php echo $drow['value'];?>">

                    </div>

                    
     <!--  <a class="add-box" href="#">Add More</a> -->
                   
                    



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

                      <div class="checkbox">

                        <input id="remember-1" type="checkbox">

                        <label for="remember-1"> Remember me </label>

                      </div>

                    </div> -->


										<div class="form-group text-left m-b-0">
                    <input type="hidden" name="btn" value="<?php echo $adminID;?>">
 
											<button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">

												Edit Currency

											</button>

											<button type="reset" class="btn btn-default waves-effect waves-light m-l-5" onclick="location.href='customer_currecny.php'">

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

        <script type="text/javascript">

         $('document').ready(function()

                    { 

                      /* validation */

                      $(".form-horizontal").validate({

                          rules:

                       {

                       
                       name: {

                                required: true

                                

                                },

                        email: {

                                required: true,

                                email: true

                                },

                        termsConditions : {

                                required: true

                                

                                },

                        

                        },



                           messages:

                        {

                               
                                name: "please enter your name",

                                email: "please enter your email address",

                                

                                

                           },

                        //submitHandler: submitForm

                           });  

                        /* validation */

                        

                        /* login submit */

                        function submitForm()

                        {  

                           

                       var data = $("#form-signin").serialize();

                       $.ajax({

                        

                       type : 'POST',

                       url  : 'edit_admin_user.php',

                       data : data,
                       contentType: false, 
                       cache: false,           
                       processData:false, 

                       beforeSend: function()

                       { 

                        $("#error").fadeOut();

                        $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Validating...');

                       },

                       success :  function(response)

                          {  

                            alert(response);
                           
                          if(response=="ok"){

                             

                          $("#btn-submit").html('Edit Admin');

                          $(".alert-success").show();

                          $(".alert-success").fadeOut(4000);

                          setTimeout(' window.location.href = "manage_admins.php"; ',4000);

                         }

                         else{

                             

                          $("#error").fadeIn(1000, function(){      

                          $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');

                               $("#btn-submit").html('manage_admins');

                             });

                         }

                         }

                       });

                        return false;

                      }

                        /* login submit */

                    });

        </script>

        





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