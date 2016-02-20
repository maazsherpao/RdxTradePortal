
             <!-- ========== Get Page Header ========== -->
             <?php 
              include_once('header.php');
              require_once 'config.php';
              include_once('functions.php');

              $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
              if ($page <= 0) $page = 1;
               
              $per_page = 10; // Set how many records do you want to display per page.
               
              $startpoint = ($page * $per_page) - $per_page;
               
              $statement = "products_category ORDER BY created_date DESC"; // Change `records` according to your table name.

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
                                <h4 class="page-title">Product Categories</h4>
                                 <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="products.php">Products</a></li>
                                    <li class="active">Products Categories</li>
                                </ol>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-lg-12">
                        		<div class="card-box">
                        			<div class="row">
			                        	<div class="col-sm-8">
			                        		<form role="form">
			                                    <div class="form-group contact-search m-b-30">
			                                    	<input type="text" id="search" class="form-control" placeholder="Search...">
			                                        <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
			                                    </div> <!-- form-group -->
			                                </form>
			                        	</div>
			                        	<div class="col-sm-4">
			                        		 <a href="#custom-modal" onclick="location='add_product_category.php'" class="btn btn-default btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal" 
			                                                    	data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add Category</a>
			                        	</div>
			                        </div>
			                        
                        			<div class="table-responsive">
                                        <table class="table table-hover mails m-0 table table-actions-bar">
                                        	<thead>
												<tr>
													
													<th>Category Name</th>
													<th>Start Date</th>
													<th>Action</th>
												</tr>
											</thead>
											
                                            <tbody class="searchable">
                                             <?php
                                        $stmt = $db_con->prepare("SELECT * FROM products_category
                                        ORDER BY created_date DESC LIMIT {$startpoint} , {$per_page}");
                                        $stmt->execute();
                                        $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
                                        $count = $stmt->rowCount(); 
                                                                           
                                        foreach ($rows as $row) {
                                            
                                        ?>
                                        <tr>
                                         
                                            <td>
                                                <?php echo $row['title'];?>
                                            </td>
                                            
                                           
                                            
                                            <td>
                                                <?php echo $row['created_date'];?>
                                            </td>
                                            <td>
                                            	<a href="edit_product_category.php?id=<?php echo $row['id'];?>" class="table-action-btn"><i class="md md-edit"></i></a>
                                            	<a href="#" class="table-action-btn remove-row" id="<?php echo $row['id'];?>"><i class="md md-close"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                                
                                                
                                               
                                            
                                            </tbody>
                                        </table>
                                    </div>
                        		</div>

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
                                
                            </div> <!-- end col -->

                            
                        </div>

                        
                        
                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                 <!-- ========== Footer ========== -->
                  <?php include_once('footer.php');?>
                 <!-- Footer End -->

            </div>
            
            
            <!-- Modal -->
			<div id="custom-modal" class="modal-demo">
			    <button type="button" class="close" onclick="Custombox.close();">
			        <span>&times;</span><span class="sr-only">Close</span>
			    </button>
			    <h4 class="custom-modal-title">Add Customer</h4>
			    <div class="custom-modal-text text-left">
			        <form role="form">
			        	<div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        
                        <div class="form-group">
                            <label for="position">Contact number</label>
                            <input type="text" class="form-control" id="position" placeholder="Enter number">
                        </div>
                        
                        
                        <button type="submit" class="btn btn-default waves-effect waves-light">Save</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>
                    </form>
			    </div>
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
        
        <!-- Modal-Effect -->
        <script src="assets/plugins/custombox/dist/custombox.min.js"></script>
        <script src="assets/plugins/custombox/dist/legacy.min.js"></script>
        
        <script>

          // $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
           $(".remove-row").click(function(){
            
           var element = $(this);
           var del_id = element.attr("id");
           var info = 'id=' + del_id;
           if(confirm("Are you sure you want to delete this Product Category?"))
           {
           $.ajax({
           type: "POST",
           url: "delete_product_category.php",
           data: info,
           success: function(){
          }
          });
          $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
          .animate({ opacity: "hide" }, "slow");
         }
        return false;
        });
            

           // var $form=$(this).closest('form'); 

         
        </script>

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


    </script>
       
    
    </body>
</html>