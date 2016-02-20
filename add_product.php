<?php  

             session_start();

             if(!isset($_SESSION['user_session'])) {header('location:login.php');}

             if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}

             if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}



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

                                <h4 class="page-title">Add Product</h4>

                                <ol class="breadcrumb">

                                    <li><a href="index.php">Home</a></li>

                                    <li><a href="product.php">Products</a></li>

                                    <li class="active">Add Product</li>

                                </ol>

                            </div>

                        </div>

                        

                        <div class="row">

              <div class="col-lg-12">

                <div class="card-box">

                  <h4 class="m-t-0 header-title"><b>Add Product</b></h4>

                  <p class="text-muted font-13 m-b-30">

                                      Please fill the form to add product.

                                  </p>
                                   <!-- error will be shown here ! -->

             <div id="error">

             

             </div>
                                            

                  <form method="post" action="add_product_process.php" class="form-horizontal" enctype="multipart/form-data" id="form-signin">
                    <div class="form-group">

                     <label for="product_category_id">Category Name</label>
                      <select name="product_category_id" class="form-control">
                   <?php
                    $stmt = $db_con->prepare("SELECT * FROM products_category WHERE is_active = 1 ");
                    $stmt->execute();
                    $rows = $stmt->fetchall(PDO::FETCH_ASSOC);

                    foreach ($rows as $row) {
                    
                    ?>

                    
                   
                      <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                      
                    
                      

                   
                    
                    <?php } ?>
                    </select>
                     </div>
                    <div class="form-group">

                      <label for="title">Product Name *</label>

                      <input type="text" name="title" parsley-trigger="change" required placeholder="Enter product name" class="form-control" id="title">

                    </div>

                    <div class="form-group">

                      <label for="emailAddress">Product SKU *</label>

                      <input type="text" name="sku" parsley-trigger="change" required placeholder="Enter Product SKU" class="form-control" id="sku">

                    </div>

                    <div class="form-group">

                      <label for="price">Price *</label>

                      <input id="price" name="price" type="text" placeholder="Enter Product Price with currency symbol" required class="form-control">

                    </div>

                    <div class="form-group">

                      <label for="trad_price">Trade Price *</label>

                      <input id="trad_price" name="trad_price" type="text" placeholder="Enter Product's Trade Price with currency symbol" required class="form-control">

                    </div>

                    <div class="form-group">

                      <label for="passWord2">Product Weight *</label>

                      <input  type="text" required placeholder="Enter Product Weight" class="form-control" name="weight" id="weight">

                    </div>

                    <div class="form-group">

                      <label for="city">Product Description *</label>

                      <textarea name="description" class="form-control" id="description"></textarea>

                    </div>

                    <!-- <div class="form-group">

                      <label for="quantity">Product Quantity *</label>

                      <input type="text" required placeholder="Enter Product Quantity" name="quantity" class="form-control" id="quantity">

                    </div> -->

                     <p class="text-box">
                     <label for="sizes">Add Size <span class="box-number">1</span></label>
                     <input type="text" name="sizes[]" value="" id="sizes" placeholder="Product Sizes" />
                     <input type="text" name="quantity[]" value="" id="quantity" placeholder="Product Quantity" />
                     <a class="add-box" href="#">Add More</a>
                     </p>

                    



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



                   <div class="form-group">

                            <label class="control-label">Product Image</label>
                            <input type="file" name="image">
                          </div>

                    <!-- <div class="form-group">

                      <div class="checkbox">

                        <input id="remember-1" type="checkbox">

                        <label for="remember-1"> Remember me </label>

                      </div>

                    </div> -->



                    <div class="form-group text-left m-b-0">
                      <input type="hidden" name="btn">
                      <button class="btn btn-primary waves-effect waves-light" type="submit">

                        Add Product

                      </button>

                      <button type="reset" class="btn btn-default waves-effect waves-light m-l-5" onclick="location.href='product.php'" id="btn-submit">

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

    <script type="text/javascript">
jQuery(document).ready(function($){
    $('#form-signin .add-box').click(function(){
        var n = $('.text-box').length + 1;
        if( 4 < n ) {
            alert('Stop it!');
            return false;
        }
        var box_html = $('<p class="text-box"><label for="box' + n + '">Add Size <span class="box-number">' + n + '</span></label> <input type="text" name="sizes[]" value="" id="box' + n + '" /> <input type="text" name="quantity[]" value="" id="qty" placeholder="Quantity" /> <a href="#" class="remove-box">Remove</a></p>');
        box_html.hide();
        $('#form-signin p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
    $('#form-signin').on('click', '.remove-box', function(){
        $(this).parent().css( 'background-color', '#FF6C6C' );
        $(this).parent().fadeOut("slow", function() {
            $(this).remove();
            $('.box-number').each(function(index){
                $(this).text( index + 1 );
            });
        });
        return false;
    });
});
</script>





  </body>

</html>