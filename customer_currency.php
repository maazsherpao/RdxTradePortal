             <?php  
             session_start();
             if(!isset($_SESSION['user_session'])) {header('location:login.php');}
             //if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ header('location:admin.php');}
             //if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){ header('location:customer.php');}

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
               
              $statement = "customer_currency ORDER BY created_date DESC"; // Change `records` according to your table name.

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

                                <h4 class="page-title">Manage Customer Currency</h4>

                                <ol class="breadcrumb">

                                    <li><a href="index.php">Home</a></li>

                                    <li class="active">Manage Customer Currency</li>

                                </ol>

                            

                            </div>

                        </div>







                        <div class="panel">

                            

                            <div class="panel-body">

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="m-b-30">

                                            <button id="addToTable" class="btn btn-default waves-effect waves-light" onclick="location.href='add_currency.php'">

                                            Add Currency <i class="fa fa-plus"></i></button>

                                        </div>

                                    </div>

                                </div>

                                

                                <div class="">

                                    <table class="table table-striped" id="">

                                        <thead>

                                            <tr>
                                                    <th>Currency</th>
                                                    <th>Value</th>
                                                   
                                                    <th>Date</th>
                                                    
                                                    <th style="min-width: 80px;">Action</th>
                                                </tr>

                                        </thead>

                                        <tbody>
                                        <?php
                                        $stmt = $db_con->prepare("SELECT * FROM customer_currency
                                        ORDER BY created_date DESC LIMIT {$startpoint} , {$per_page}");
                                        $stmt->execute();
                                        $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
                                        $count = $stmt->rowCount(); 
                                                                           
                                        foreach ($rows as $row) {
                                            
                                        ?>

                                            <tr class="gradeX">
                                            
                                                <td><?php echo strtoupper($row['currency']);?></td>
                                                <td><?php echo $row['value'];?></td>
                                                <td><?php echo $row['created_date'];?></td>
                                                <td class="actions">

                                                    <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>

                                                    <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>

                                                    <a href="edit_currency.php?id=<?php echo $row['id'];?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>

                                                    <a href="#" id="<?php echo $row['id'];?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>

                                                </td>

                                            </tr>

                                         <?php } ?>  
                                          


                                        </tbody>

                                    </table>



                                </div>

                            </div>

                            <!-- end: page -->



                       


                    
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
                 </div> <!-- end Panel -->

                      



                      

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



        <!-- Examples -->

        <script src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>

        <script src="assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script> 

        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>

        <script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>

        

        <!-- Modal-Effect -->

        <script src="assets/plugins/custombox/dist/custombox.min.js"></script>

        <script src="assets/plugins/custombox/dist/legacy.min.js"></script>



        <script src="assets/pages/datatables.editable.init.js"></script>

        

        <script>

           $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
           $(".remove-row").click(function(){
            
           var element = $(this);
           var del_id = element.attr("id");
           var info = 'id=' + del_id;
           if(confirm("Are you sure you want to delete this Currency?"))
           {
           $.ajax({
           type: "POST",
           url: "delete_currency.php",
           data: info,
           success: function(){
          }
          });
          $(this).parents(".gradeX").animate({ backgroundColor: "#003" }, "slow")
          .animate({ opacity: "hide" }, "slow");
         }
        return false;
        });
            

           // var $form=$(this).closest('form'); 

         
        </script>


    

    </body>

</html>