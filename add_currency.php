<?php

             session_start();
             error_reporting(0);
             if(!isset($_SESSION['user_session'])) {header('location:login.php');}

             // if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}

             // if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}



             ?>

             <!-- ========== Get Page Header ========== -->

            <?php include_once('header.php');require 'config.php'; ?>



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

                                <h4 class="page-title">Add Customer's Currency</h4>

                                <ol class="breadcrumb">

                                    <li><a href="index.php">Home</a></li>

                                    <li><a href="product.php">Customer's Currency</a></li>

                                    <li class="active">Add Customer's Currency</li>

                                </ol>

                            </div>

                        </div>



                        <div class="row">

              <div class="col-lg-12">

                <div class="card-box">

                  <h4 class="m-t-0 header-title"><b>Add Customer's Currency</b></h4>

                  <p class="text-muted font-13 m-b-30">

                                      Please fill the form to add currency for customer.

                                  </p>
                                   <!-- error will be shown here ! -->

             <div id="error">



             </div>


                  <form method="post" action="add_currency_process.php" class="form-horizontal" enctype="multipart/form-data" id="form-signin">

                    <div class="form-group">

                      <label for="title">Currency *</label>

                      <input type="text" name="currency" required placeholder="Enter Currency Code(eg Dollar = USD)" class="form-control" id="currency">

                    </div>

                    <div class="form-group">

                      <label for="emailAddress">Currency Value*</label>

                      <input type="text" name="value" required placeholder="Enter currency value w.r.t dollar" class="form-control" id="value">

                    </div>




                    <!-- <div class="form-group">

                      <label for="quantity">Product Quantity *</label>

                      <input type="text" required placeholder="Enter Product Quantity" name="quantity" class="form-control" id="quantity">

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

                      <div class="checkbox">

                        <input id="remember-1" type="checkbox">

                        <label for="remember-1"> Remember me </label>

                      </div>

                    </div> -->



                    <div class="form-group text-left m-b-0">
                      <input type="hidden" name="btn">
                      <button class="btn btn-primary waves-effect waves-light" type="submit">

                        Add Customer's Currency

                      </button>

                      <button type="reset" class="btn btn-default waves-effect waves-light m-l-5" onclick="location.href='customer_currency.php'" id="btn-submit">

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
