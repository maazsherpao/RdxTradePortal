            <?php  
             session_start();
             
             if(!isset($_SESSION['customer_id'])) {header('location:login.php');}
             //if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}
             //if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}

             
             ?>
            <!-- ========== Get Page Header ========== -->
            <?php include_once('header.php'); require 'config.php'; ?>
            <?php 
            $page_title="Products";
            $action = isset($_GET['action']) ? $_GET['action'] : "";
             $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "1";
             $name = isset($_GET['name']) ? $_GET['name'] : "";
                 
             if($action=='added'){
                    echo "<div class='alert alert-info'>";
                        echo "<strong>{$name}</strong> was added to your cart!";
                    echo "</div>";
                }
                 
                if($action=='exists'){
                    echo "<div class='alert alert-info'>";
                        echo "<strong>{$name}</strong> already exists in your cart!";
                    echo "</div>";
             }

            ?>
            
            <!-- ========== Left Sidebar Start ========== -->
            <?php include_once('sidebar-customers.php');?>
            <!-- Left Sidebar End -->
           
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->    
            <link href="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="page-title">Products</h4>
                                 <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Products</li>
                                </ol>
								
							</div>
						</div>

                        <!-- SECTION FILTER
                        ================================================== -->
                       <!--  <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter">
                                    <a href="#" data-filter="*" class="current">All</a>
                                    <a href="#" data-filter=".mobiles">Boxing</a>
                                    <a href="#" data-filter=".tablets">MMA</a>
                                    <a href="#" data-filter=".other">Fitness</a>
                                    <a href="#" data-filter=".desktops">Muay Thai</a>
                                    <a href="#" data-filter=".other">Women</a>
                                    <a href="#" data-filter=".other">Kids</a>
                                    
                                </div>
                            </div>
                        </div> -->

                        <div class="row port">
                            <div class="portfolioContainer m-b-15">
                            <?php
                            $query = "SELECT * FROM products ORDER BY title";
                            $stmt = $db_con->prepare( $query );
                            $stmt->execute();
                            $num = $stmt->rowCount();
                            if($num>0){
                            $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
                            foreach ($rows as $row) {
                            ?>
                                <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="assets/images/products/<?php echo $row['image']; ?>" class="image-popup" title="Screenshot-1">
                                        <img src="assets/images/products/<?php echo $row['image']; ?>" class="thumb-img" alt="work-thumbnail">
                                        </a>

                                        <!-- <div class="product-action">
                                            <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                                        </div> -->

                                        <div class="detail">
                                            <h4 class="m-t-0 m-b-5 text-center"><a href="" class="text-dark"><?php echo $row['title']; ?></a> </h4>
                                           <!--  <div class="rating">
                                                <ul class="list-inline">
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star" href=""></a></li>
                                                    <li><a class="fa fa-star-o" href=""></a></li>
                                                </ul>
                                            </div> -->
                                            <div class='product-id' style='display:none;'><?php $row['id'];?></div>
                                            <div class="row">
                                            <form>
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                        <label class="control-label">10oz</label>
                                                        <input class="vertical-spin form-control" id="tenoz" type="text" value="" name="10oz" style="display: block;">
                                                    </div>
                                            </div>
                                            <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">12oz</label>
                                                        <input id="12oz" class="vertical-spin form-control" type="text" value="" name="12oz" style="display: block;">
                                                    </div>
                                            </div>

                                            <div class="col-md-3">
                                            <div class="form-group">
                                                        <label class="control-label">14oz</label>
                                                       <input id="14oz" class="vertical-spin form-control" type="text" value="" name="14oz" style="display: block;">
                                                    </div>
                                            </div>
                                            <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">16oz</label>
                                                        <input id="16oz" class="vertical-spin form-control" type="text" value="" name="16oz" style="display: block;">
                                                    </div>
                                            </div>
                                                    </form>
                                                    </div>
                                            <h5 class="m-0 text-center"><span class="text-custom"><?php echo $row['price'];?></span> <span class="text-muted m-l-15"> Stock :<?php echo $row['quantity'];?>pcs.</span></h5><br>
                                       <div> <button type="button" class="btn btn-block btn--md btn-pink waves-effect waves-light" onclick="add_to_cart.php?id=<?php echo $row['id']?>&name=<?php echo $row['title']?>">Shop Now</button></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } } else {?>
                            <h3>NO PRODUCTS FOUND!</h3>
                            <?php } ?>

                            </div>
                        </div> <!-- End row -->




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
        <script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
		
        <script type="text/javascript" src="assets/plugins/isotope/dist/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>

        <script type="text/javascript">
            $(window).load(function(){
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });



                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                });
            });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });

                 //Bootstrap-TouchSpin
                  //$("input[name='10oz']").TouchSpin({});
                 // $("input[name='12oz']").TouchSpin({});
                 // $("input[name='14oz']").TouchSpin({});
                 // $("input[name='16oz']").TouchSpin({});

                  //Bootstrap-TouchSpin
                // $("#10oz").TouchSpin({
                //     verticalbuttons: true,
                //     verticalupclass: 'ion-plus-round',
                //     verticaldownclass: 'ion-minus-round'
                // });
                
                
                // $("#tenoz").TouchSpin({
                //     verticalbutton#10ozs: true,
                //     verticalupclass: 'ion-plus-round',
                //     verticaldownclass: 'ion-minus-round'
                // });
                // var vspinTrue = $("#tenoz").TouchSpin({
                //     verticalbuttons: true
                // });

                //  var vspinTrue = $("#12oz").TouchSpin({
                //     verticalbuttons: true
                // });

                //  var vspinTrue = $("#14oz").TouchSpin({
                //     verticalbuttons: true
                // }); 

                //  var vspinTrue = $("#16oz").TouchSpin({
                //     verticalbuttons: true
                // });

               
                
            });
        </script>
       <script>
    $("input[name='10oz']").TouchSpin({
      verticalbuttons: true,
       min: 0,
       max: 10000
    });
    $("input[name='12oz']").TouchSpin({
      verticalbuttons: true
    });
    $("input[name='14oz']").TouchSpin({
      verticalbuttons: true
    });
    $("input[name='16oz']").TouchSpin({
      verticalbuttons: true
    });
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 
</body>
</html>

    </body>
</html>