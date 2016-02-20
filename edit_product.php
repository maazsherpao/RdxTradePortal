<?php  

             session_start();

             if(!isset($_SESSION['user_session'])) {header('location:login.php');}

             if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}

             if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}

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

                                <h4 class="page-title">Edit Product</h4>

                                <ol class="breadcrumb">

                                    <li><a href="index.php">Home</a></li>

                                    <li><a href="products.php">Products</a></li>

                                    <li class="active">Edit Product</li>

                                </ol>

                            </div>

                        </div>

                        

                        <div class="row">

							<div class="col-lg-12">

								<div class="card-box">

									<h4 class="m-t-0 header-title"><b>Edit Product</b></h4>

									<p class="text-muted font-13 m-b-30">
	                Please fill the form to edit product.
	                </p>
		                                         
                   
									<form method="post" action="edit_product_user.php" class="form-horizontal" enctype="multipart/form-data" id="form-signin">
                  <?php
                   $adminID = $_GET['id'];
                   $stmt = $db_con->prepare("SELECT * FROM products WHERE id = $adminID");
                   $stmt->execute();
                   $drow = $stmt->fetch(PDO::FETCH_ASSOC);
                   $count = $stmt->rowCount(); 
                                         
                   ?>
										<div class="form-group">

                     <label for="product_category_id">Category Name</label>
                      <select name="product_category_id" class="form-control">
                   <?php
                    $stmt12 = $db_con->prepare("SELECT * FROM products_category WHERE is_active = 1 ");
                    $stmt12->execute();
                    $rows = $stmt12->fetchall(PDO::FETCH_ASSOC);

                    foreach ($rows as $row) {
                    
                    ?>

                    
                   
                      <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                      
                    
                      

                   
                    
                    <?php } ?>
                    </select>
                     </div>
                    <div class="form-group">

                      <label for="title">Product Name *</label>

                      <input type="text" name="title" parsley-trigger="change" required placeholder="Enter product name" class="form-control" id="title" value="<?php echo $drow['title'];?>">

                    </div>

                    <div class="form-group">

                      <label for="emailAddress">Product SKU *</label>

                      <input type="text" name="sku" parsley-trigger="change" required placeholder="Enter Product SKU" class="form-control" id="sku" value="<?php echo $drow['sku'];?>">

                    </div>

                    <div class="form-group">

                      <label for="price">Price *</label>

                      <input id="price" name="price" type="text" placeholder="Enter Product Price with currency symbol" required class="form-control" value="<?php echo $drow['price'];?>">

                    </div>

                    <div class="form-group">

                      <label for="price">Trade Price *</label>

                      <input id="trade_price" name="trade_price" type="text" placeholder="Enter Product Trade Price with currency symbol" required class="form-control" value="<?php echo $drow['trade_price'];?>">

                    </div>

                    <div class="form-group">

                      <label for="passWord2">Product Weight *</label>

                      <input  type="text" required placeholder="Enter Product Weight" class="form-control" name="weight" id="weight" value="<?php echo $drow['weight'];?>">

                    </div>

                    <div class="form-group">

                      <label for="city">Product Description *</label>

                      <textarea name="description" class="form-control" id="description"><?php echo $drow['description'];?></textarea>

                    </div>
                   
                    <?php
                    $getSizes = $db_con->prepare("SELECT * FROM product_sizes WHERE product_id = :id");
                    $getSizes->execute(array(":id"=>$adminID));
                    $rowResults = $getSizes->fetchall(PDO::FETCH_ASSOC);
                    foreach ($rowResults as $ed) {
                      
                    ?>

                     <p class="text-box">
                     <input type="hidden" name="sizeID[]" value="<?php echo $ed['id'];?>">
                     <label for="sizes">Add Size <span class="box-number">1</span></label>
                     <input type="text" name="sizes[]" value="<?php echo $ed['size'];?>" id="sizes" placeholder="Product Sizes" />
                     <input type="text" name="quantity[]" value="<?php echo $ed['quantity'];?>" id="quantity" placeholder="Product Quantity" />
                   </p>

                   <?php } ?>
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



                   <div class="form-group">
                          <div class="img"><img src="assets/images/products/<?php echo $drow['image'];?>" alt="Product Avatar" width="100"></div>
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
                    <input type="hidden" name="btn" value="<?php echo $adminID;?>">
 
											<button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">

												Edit Product

											</button>

											<button type="reset" class="btn btn-default waves-effect waves-light m-l-5" onclick="location.href='product.php'">

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