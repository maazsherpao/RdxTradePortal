              <?php  
             session_start();
             if(!isset($_SESSION['user_session'])) {header('location:login.php');}
             ?>
             <!-- ========== Get Page Header ========== -->
            <?php 
              include_once('header.php');
              require_once 'config.php';
              include_once('functions.php');

              $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
              if ($page <= 0) $page = 1;
               
              $per_page = 10; // Set how many records do you want to display per page.
               
              $startpoint = ($page * $per_page) - $per_page;
               
              $statement = "customers ORDER BY created_date DESC"; // Change `records` according to your table name.

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
                                <h4 class="page-title">Customers</h4>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Customers</a></li>
                                    <li class="active">Customers</li>
                                </ol>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-lg-12">
                        		<div class="card-box">
                        			<div class="row" action="customer_search.php" method="get">
			                        	<div class="col-sm-8">
			                        		<form role="form">
			                                    <div class="form-group contact-search m-b-30">
			                                    	<input type="text" id="search" name="search" class="form-control" placeholder="Search...">
			                                        <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
			                                    </div> <!-- form-group -->
			                                </form>
			                        	</div>
			                        	<div class="col-sm-4">
			                        		 <a href="#" class="btn btn-default btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal" 
			                                                    	data-overlaySpeed="200" data-overlayColor="#36404a" onclick="location.href='add_customer.php'"><i class="md md-add"></i> Add Customer</a>
			                        	</div>
			                        </div>
			                        
                        			<div class="table-responsive">
                                        <table class="table table-hover mails m-0 table table-actions-bar">
                                        	<thead>
												<tr>
													<!-- <th>
														<div class="checkbox checkbox-primary checkbox-single m-r-15">
                                                            <input id="action-checkbox" type="checkbox">
                                                            <label for="action-checkbox"></label>
                                                        </div>
                                                        <div class="btn-group dropdown">
				                                            <button type="button" class="btn btn-white btn-xs dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="caret"></i></button>
				                                            <ul class="dropdown-menu" role="menu">
				                                                <li><a href="#">Action</a></li>
				                                                <li><a href="#">Another action</a></li>
				                                                <li><a href="#">Something else here</a></li>
				                                                <li class="divider"></li>
				                                                <li><a href="#">Separated link</a></li>
				                                            </ul>
				                                        </div>
													</th> -->
                                                    <th>Customer</th>
													<th>Name</th>
													<th>Email</th>
                                                    <th>Currency</th>
													<th>Start Date</th>
                                                    <th>City</th>
                                                    <th>Country</th>
                                                    <th>Active</th>
                                                    <th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
                                            <tbody class="searchable">
                                        <?php
                                        $stmt = $db_con->prepare("SELECT * FROM customers
                                        ORDER BY created_date DESC LIMIT {$startpoint} , {$per_page}");
                                        $stmt->execute();
                                        $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
                                        $count = $stmt->rowCount(); 
                                                                           
                                        foreach ($rows as $row) {
                                            
                                        ?>
                                        <?php if($row['is_active'] == 1 ) { ?>
                                                <tr>
                                                    <td>
                                                        <!-- <div class="checkbox checkbox-primary m-r-15">
                                                            <input id="checkbox2" type="checkbox" >
                                                            <label for="checkbox2"></label>
                                                        </div> -->
                                                        <?php if(empty($row['image'])) {?>
                                                        <img src="assets/images/no-photo.gif" alt="contact-img" title="contact-img" class="img-circle thumb-sm" />
                                                        <?php } else {?>
                                                        <img src="assets/images/users/<?php echo $row['image'];?>" alt="contact-img" title="contact-img" class="img-circle thumb-sm" />
                                                        <?php } ?>

                                                        
                                                        
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $row['first_name']." ".$row['last_name'];?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $row['email'];?>
                                                    </td>

                                                    <td>
                                                    <?php 
                                                    $getCurrency = $db_con->prepare("SELECT currency FROM customer_currency WHERE id = :id");
                                                    $getCurrency->execute(array(":id"=>$row['currency_id']));
                                                    $getResult = $getCurrency->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                        <?php echo strtoupper($getResult['currency']);?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $row['created_date'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['city'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['country'];?>
                                                    </td>
                                                    <td>
                                                        <?php if($row['is_active'] == 0) 
                                                        {
                                                            echo "Blocked"
                                                        ?>
                                                        
                                                         <?php } else{?>
                                                        <?php echo 'Active';}?>
                                                    </td>

                                                    <td>
                                                        <?php if($row['confirm'] == 0) 
                                                        {?>
                                                         <button type="submit" class="btn btn-primary" onclick="location.href='activate_customer.php?id=<?php echo $row['id'];?>'">
                                                         Confirm</button>
                                                         <?php } else{?>
                                                        <?php echo 'Confirmed';}?>
                                                    </td>
                                                    <td>
                                                    	<a href="edit_customer.php?id=<?php echo $row['id'];?>" data-toggle="tooltip" title="Edit Customer" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                    	<a href="#" data-toggle="tooltip" title="Block Customer" id="<?php echo $row['id'];?>" class="on-default block-row"><i class="fa fa-user-times"></i></a>
                                                      <a href="#" data-toggle="tooltip" title="Delete Customer" id="<?php echo $row['id'];?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                        <?php } else {?>

                                        <tr>
                                                    <td>
                                                        <!-- <div class="checkbox checkbox-primary m-r-15">
                                                            <input id="checkbox2" type="checkbox" >
                                                            <label for="checkbox2"></label>
                                                        </div> -->
                                                        
                                                        <img src="assets/images/users/<?php echo $row['image'];?>" alt="contact-img" title="contact-img" class="img-circle thumb-sm" />
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $row['first_name']." ".$row['last_name'];?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $row['email'];?>
                                                    </td>

                                                    <td>
                                                     <?php 
                                                    $getCurrency = $db_con->prepare("SELECT currency FROM customer_currency WHERE id = :id");
                                                    $getCurrency->execute(array(":id"=>$row['currency_id']));
                                                    $getResult = $getCurrency->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                        <?php echo strtoupper($getResult['currency']);?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $row['created_date'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['city'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['country'];?>
                                                    </td>
                                                      <td>
                                                        <?php if($row['is_active'] == 0) 
                                                        {
                                                            echo "Blocked"
                                                        ?>
                                                        
                                                         <?php } else{?>
                                                        <?php echo 'Active';}?>
                                                    </td>

                                                    <td>
                                                        <?php if($row['confirm'] == 0) 
                                                        {?>
                                                         <button type="submit" class="btn btn-primary" onclick="location.href='activate_customer.php?id=<?php echo $row['id'];?>'">
                                                         Confirm</button>
                                                         <?php } else{?>
                                                        <?php echo 'Confirmed';}?>
                                                    </td>
                                                    <td>
                                                      <a href="edit_customer.php?id=<?php echo $row['id'];?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                      <a href="#" data-toggle="tooltip" title="Un Block Customer" id="<?php echo $row['id'];?>" class="on-default unblock-row"><i class="fa fa-unlock"></i></a>
                                                      <a href="#" id="<?php echo $row['id'];?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                                
                                      <?php } ?>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                        		</div>
                                
                            </div> <!-- end col -->

                            <style>
                ul.pagination{margin-top: 0px !important;float: right;}
                </style>
                <div class="row">
                <div class="col-sm-6">
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">

                </div>
                </div>
                <div class="col-sm-6">
                <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                <?php echo pagination($db_con,$statement,$per_page,$page,$url='?');?>
                </div>
                </div>
                </div>

                            
                        </div>

                        
                        
                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                 <!-- ========== Footer ========== -->
                  <?php include_once('footer.php');?>
                 <!-- Footer End -->

            </div>
            
            
            <!-- Modal -->
			
            
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
        
        <!-- Modal-Effect -->
        <script src="assets/plugins/custombox/dist/custombox.min.js"></script>
        <script src="assets/plugins/custombox/dist/legacy.min.js"></script>

       
    <script>
    $(document).ready(function () {

    (function ($) {

        $('#search').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));

});

    $(".block-row").click(function(){
      
       var element = $(this);
       var del_id = element.attr("id");
       var info = 'id=' + del_id;
       if(confirm("Are you sure you want to block this customer?"))
       {
       $.ajax({
       type: "POST",
       url: "block_customer.php",
       data: info,
       success: function(){
      }
      });
      // $(this).parents(".gradeX").animate({ backgroundColor: "#003" }, "slow")
      // .animate({ opacity: "hide" }, "slow");
       location.reload();
     }
    return false;
    });

     $(".unblock-row").click(function(){
      
       var element = $(this);
       var del_id = element.attr("id");
       var info = 'id=' + del_id;
       if(confirm("Are you sure you want to Unblock this customer?"))
       {
       $.ajax({
       type: "POST",
       url: "unblock_customer.php",
       data: info,
       success: function(){
      }
      });
      // $(this).parents(".gradeX").animate({ backgroundColor: "#003" }, "slow")
      // .animate({ opacity: "hide" }, "slow");
      location.reload();
     }
    return false;
    });

       $(".remove-row").click(function(){
            
           var element = $(this);
           var del_id = element.attr("id");
           var info = 'id=' + del_id;
           if(confirm("Are you sure you want to delete this Customer?"))
           {
           $.ajax({
           type: "POST",
           url: "delete_customer.php",
           data: info,
           success: function(){
          }
          });
          $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
          .animate({ opacity: "hide" }, "slow");
         }
        return false;
        });
      


    </script>

        

       
    
    </body>
</html>