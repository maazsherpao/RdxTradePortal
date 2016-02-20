 <?php  
             session_start();
             if(!isset($_SESSION['customer_id'])) {header('location:login.php');}
             //if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}
             //if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}

             ?>
             <!-- ========== Get Page Header ========== -->
            <?php include_once('header.php'); 
                  require_once 'config.php';
                  include_once('functions.php');

              $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
              if ($page <= 0) $page = 1;
               
              $per_page = 10; // Set how many records do you want to display per page.
               
              $startpoint = ($page * $per_page) - $per_page;
               
              $statement = "order_detail ORDER BY created_date DESC"; // Change `records` according to your table name.

            ?>

            
            <!-- ========== Left Sidebar Start ========== -->
            <?php include_once('sidebar-customers.php');?>
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
                                <h4 class="page-title">Orders</h4>
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Orders</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="row m-t-10 m-b-10">
                                        <div class="col-sm-6 col-lg-8">
                                            <form role="form">
                                                <div class="form-group contact-search m-b-30">
                                                    <input type="text" id="search" class="form-control" placeholder="Search...">
                                                    <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                                                </div> <!-- form-group -->
                                            </form>
                                        </div>

                                        <!-- <div class="col-sm-6 col-lg-4">
                                            <div class="h5 m-0">
                                                <span class="vertical-middle">Sort By:</span>
                                                <div class="btn-group vertical-middle" data-toggle="buttons">
                                                     <label class="btn btn-white btn-md waves-effect active">
                                                        <input type="radio" autocomplete="off" checked=""> Status
                                                     </label>
                                                     <label class="btn btn-white btn-md waves-effect">
                                                        <input type="radio" autocomplete="off"> Type
                                                     </label>
                                                     <label class="btn btn-white btn-md waves-effect">
                                                        <input type="radio" autocomplete="off"> Name
                                                     </label>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Customer Name</th>
                                                    <th>Quantity</th>
                                                    
                                                    <th>Amount</th>
                                                   
                                                    <th>Date</th>
                                                    <th style="min-width: 80px;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody class="searchable">
                                            <?php
                                            $customerID = $_SESSION['customer_id'];
                                        $stmt = $db_con->prepare("SELECT * FROM order_detail WHERE customer_id = :customer_id ORDER BY created_date DESC LIMIT {$startpoint} , {$per_page}");
                                        $stmt->execute(array(":customer_id"=>$customerID));
                                        $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
                                        $count = $stmt->rowCount(); 
                                       // echo $count;exit;
                                        if($count != 0) {                                 
                                        foreach ($rows as $row) {
                                            
                                        ?>
                                                <tr>
                                                    <td>
                                                    <?php
                                                    $image = $db_con->prepare("SELECT image FROM products WHERE id = :id");
                                                    $image->execute(array(":id"=>$row['product_id']));
                                                    $img1 = $image->fetch(PDO::FETCH_ASSOC);
                                                   // $count = $stmt->rowCount(); 
                                                    ?>
                                                    <img src="assets/images/products/<?php echo $img1['image'];?>" class="thumb-sm" alt="">
                                                    </td>

                                                     <?php


                                                    $query1 = $db_con->prepare("SELECT first_name,last_name FROM customers WHERE id=:id ");
                                                    $query1->execute(array(":id"=>$row['customer_id']));
                                                    $customerName = $query1->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                     <td>
                                                        <?php echo $customerName['first_name']." ".$customerName['last_name'];?>
                                                    </td>
                                                    
                                                    <td><?php echo $row['total_quantity'];?></td>
                                                    <?php
                                                     $currencyCus = $db_con->prepare("SELECT * FROM customer_currency WHERE id = :id");
                                                    $currencyCus->execute(array(":id"=>$row['currency_id']));
                                                    $cusCurrencyTitle = $currencyCus->fetch(PDO::FETCH_ASSOC);
                                                    $CurrencyTitle = strtoupper($cusCurrencyTitle['currency']);
                                                    $CurrencyValue = $cusCurrencyTitle['value'];
                                                    $newPriceValue = $row['total_price'];

                                                    ?>


                                                    <?php if(!empty($CurrencyTitle) && !empty($CurrencyValue)) {?>
                                                    <td><?php echo $CurrencyTitle;?> <?php echo round($newPriceValue,2) ;?></td>
                                                    <?php } else {?>
                                                     <td>$ <?php echo $row['total_price'];?></td>
                                                    <?php } ?>
                                                    
                                                    
                                                    <td><?php echo $row['created_date'];?></td>
                                                    <td>
                                                        <!-- <a href="#" class="table-action-btn"><i class="md md-edit"></i></a> -->
                                                        <a href="#" id="<?php echo $row['id'];?>" class="table-action-btn remove-row"><i class="md md-close"></i></a>
                                                    </td>
                                                </tr>
                                         <?php } } else {?> 
                                         <tr>
                                             <td>No Records Found!</td>
                                         </tr>     
                                         <?php }?>
                                              

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
            <!-- <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="custom-modal-title">Add Seller</h4>
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
            </div> -->
            
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
           <!--  <div class="side-bar right-bar nicescroll">
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
            </div> -->
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


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        
        <!-- Modal-Effect -->
        <script src="assets/plugins/custombox/dist/custombox.min.js"></script>
        <script src="assets/plugins/custombox/dist/legacy.min.js"></script>
         <script>

           //$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
           $(".remove-row").click(function(){
            
           var element = $(this);
           var del_id = element.attr("id");
           var info = 'id=' + del_id;
           if(confirm("Are you sure you want to delete this Product?"))
           {
           $.ajax({
           type: "POST",
           url: "delete_order.php",
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