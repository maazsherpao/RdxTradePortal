             <?php
             session_start();
             if(!isset($_SESSION['user_session'])) {header('location:login.php');}
             //if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}
             //if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}
             ?>
             <!-- ========== Get Page Header ========== -->
            <?php

                   include_once('header.php');
                   include_once('config.php');

                   // GET Total Revenue
                   $RevenueTotal = $db_con->prepare("SELECT SUM(total_price) AS total_revenue,count(*) As total_orders FROM order_detail");
                   $RevenueTotal->execute();
                   $resultsRow = $RevenueTotal->fetch(PDO::FETCH_ASSOC);
                   $totalOrder = $resultsRow['total_orders'];

                   // GET Today Sale
                   $RevenueToday = $db_con->prepare("SELECT SUM(total_price) AS total_today FROM order_detail WHERE created_date > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY created_date DESC");
                   $RevenueToday->execute();
                   $resultToday = $RevenueToday->fetch(PDO::FETCH_ASSOC);





            ?>

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
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to RDX Trade Portal</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-attach-money text-info"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark">$<b class="counter"><?php echo round($resultsRow['total_revenue'],2);?></b></h3>
                                        <p class="text-muted">Total Revenue</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-add-shopping-cart text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark">$<b class="counter"><?php if(empty($resultToday['total_today'])) echo "0"; else echo round($resultToday['total_today'],2);?></b></h3>
                                        <p class="text-muted">Today's Sales</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-purple pull-left">
                                        <i class="md md-equalizer text-purple"></i>
                                    </div>
                                    <?php
                                    $counter_name = "counter.txt";
                                    // Check if a text file exists. If not create one and initialize it to zero.
                                    if (!file_exists($counter_name)) {
                                      $f = fopen($counter_name, "w");
                                      fwrite($f,"0");
                                      fclose($f);
                                    }
                                    // Read the current value of our counter file
                                    $f = fopen($counter_name,"r");
                                    $counterVal = fread($f, filesize($counter_name));
                                    fclose($f);
                                    // Has visitor been counted in this session?
                                    // If not, increase counter value by one
                                    if(!isset($_SESSION['hasVisited'])){
                                      $_SESSION['hasVisited']="yes";
                                      $counterVal++;
                                      $f = fopen($counter_name, "w");
                                      fwrite($f, $counterVal);
                                      fclose($f);
                                    }
                                   // echo "You are visitor number $counterVal to this site";


                                    ?>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo round(($totalOrder/$counterVal)*100,2);?></b>%</h3>
                                        <p class="text-muted">Conversion</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-success pull-left">
                                        <i class="md md-remove-red-eye text-success"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo $counterVal;?></b></h3>
                                        <p class="text-muted">Today's Customers</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                           <!--  <div class="col-lg-4">
                        		<div class="card-box">
                        			<h4 class="text-dark header-title m-t-0 m-b-30">Total Revenue</h4>
                                    <?php
                                    //$percentValue = (number_format($resultToday['total_today'])/100)*1000;
                                    $x = number_format($resultToday['total_today']);
                                    $y = 50000;

                                    $percent = $x/$y;
                                    $percent_friendly = number_format( $percent * 100 );

                                    ?>

                        			<div class="widget-chart text-center">
                                        <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#fb6d9d" value="<?php echo $percent_friendly;?>" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
	                                	<h5 class="text-muted m-t-20">Total sales made today</h5>
	                                	<h2 class="font-600">$<?php if(empty($resultToday['total_today'])) echo "0"; else echo round($resultToday['total_today'],2);?></h2>
	                                	<ul class="list-inline m-t-15">
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Target</h5>
	                                			<h4 class="m-b-0">$50000</h4>
	                                		</li>
                                            <?php
                                            $lastWeek = $db_con->prepare("SELECT total_price FROM order_detail
                                            WHERE created_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
                                            AND created_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY");
                                            $lastWeek->execute();
                                            $roeResult = $lastWeek->fetch(PDO::FETCH_ASSOC);

                                            ?>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last week</h5>
	                                			<h4 class="m-b-0">$<?php echo round($roeResult['total_price'],2);?></h4>
	                                		</li>
                                            <?php
                                            $lastMonth = $db_con->prepare("SELECT total_price FROM order_detail WHERE created_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY created_date DESC;");
                                            $lastMonth->execute();
                                            $riResult = $lastMonth->fetch(PDO::FETCH_ASSOC);
                                            ?>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last Month</h5>
	                                			<h4 class="m-b-0">$<?php echo round($riResult['total_price'],2);?></h4>
	                                		</li>
	                                	</ul>
                                	</div>
                        		</div>

                            </div> -->

                           <!--  <div class="col-lg-8">
                                <div class="card-box">
									<h4 class="text-dark header-title m-t-0">Sales Analytics</h4>
									<div class="text-center">
										<ul class="list-inline chart-detail-list">
											<li>
												<h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Desktops</h5>
											</li>
											<li>
												<h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Tablets</h5>
											</li>
											<li>
												<h5><i class="fa fa-circle m-r-5" style="color: #dcdcdc;"></i>Mobiles</h5>
											</li>
										</ul>
									</div>
									<div id="morris-bar-stacked" style="height: 303px;"></div>
								</div>
                            </div> -->

                            <div class="col-lg-12">
                                <div class="card-box">
                                    <a href="orders.php" class="pull-right btn btn-default btn-sm waves-effect waves-light">View All</a>
                                    <h4 class="text-dark header-title m-t-0">Recent Orders</h4>
                                    <p class="text-muted m-b-30 font-13">
                                        The following's are the recent 5 orders.
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table table-actions-bar m-b-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Item Name</th>
                                                    <th>Total Price</th>
                                                    <th style="min-width: 80px;">Customer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $getRecent = $db_con->prepare("SELECT * FROM orders ORDER BY created_date DESC LIMIT 5");
                                            $getRecent->execute();
                                            $rowResults = $getRecent->fetchall(PDO::FETCH_ASSOC);
                                            foreach ($rowResults as $ed) {

                                            $orderImage = $db_con->prepare("SELECT * FROM products WHERE id = :id");
                                            $orderImage->execute(array(":id"=>$ed['product_id']));
                                            $getImage = $orderImage->fetch(PDO::FETCH_ASSOC);


                                            ?>
                                                <tr>
                                                    <td><span data-plugin="peity-bar" data-colors="#5fbeaa,#5fbeaa" data-width="80" data-height="30">5,3,9,6,5,9,7,3,5,2</span></td>
                                                    <td><img src="assets/images/products/<?php echo $getImage['image'];?>" class="thumb-sm pull-left m-r-10" alt=""> <?php echo $getImage['title'];?></td>
                                                    <td><span class="text-custom">$<?php echo $getImage['price'];?></span></td>
                                                    <td>
                                                    <?php
                                                    $getCustomer = $db_con->prepare("SELECT first_name,last_name FROM customers WHERE id = :id");
                                                    $getCustomer->execute(array(":id"=>$ed['customer_id']));
                                                    $getName = $getCustomer->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                        <span class="text-custom"><?php echo $getName['first_name']." ".$getName['last_name'];?></span>
                                                    </td>
                                                </tr>

                                             <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>



						</div>
                        <!-- end row -->


                        <div class="row">

                           <!--  <div class="col-lg-6">
                        		<div class="card-box">
                        			<h4 class="text-dark header-title m-t-0">Total Sales</h4>

                        			<div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Desktops</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Tablets</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #ebeff2;"></i>Mobiles</h5>
                                            </li>
                                        </ul>
                                    </div>

                                    <div id="morris-area-with-dotted" style="height: 300px;"></div>

                        		</div>

                            </div> -->

                            <!-- col -->


                        	</div>
                        	<!-- end col -->



                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                 <!-- ========== Footer ========== -->
                  <?php include_once('footer.php');?>
                 <!-- Footer End -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <!-- <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>
                </div>
            </div>
            -->
            <!-- /Right-bar -->

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

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>



        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="assets/pages/jquery.dashboard.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>




    </body>
</html>
