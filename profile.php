             <?php  
             session_start();
             if(!isset($_SESSION['user_session'])) {header('location:login.php');}
             ?>

             <!-- ========== Get Page Header ========== -->
            <?php include_once('header.php');require_once 'config.php'; ?>
            
            <!-- ========== Left Sidebar Start ========== -->
            <?php include_once('sidebar.php');?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">

                <!-- Start content -->
                <div class="content">
                    
               <?php
                $customerID = $_SESSION['user_session'];
                $stmt = $db_con->prepare("SELECT * FROM admin WHERE id = :id");
                $stmt->execute(array(":id"=>$customerID));
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $stmt->rowCount(); 
               
                ?>

                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                <?php if(empty($rows['image'])) {?>
                                <img src="assets/images/no-photo.gif" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                <?php } else {?>
                                <img src="assets/images/users/<?php echo $rows['image'];?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                <?php } ?>
                                <h4 class="m-b-5"><b><?php echo $rows['name'];?></b></h4>
                                <p class="text-muted"><i class="fa fa-map-marker"></i> <?php echo $rows['city'];?>, <?php echo $rows['country'];?></p>
                                <button class="btn btn-pink waves-effect waves-light" onclick="location.href='admin_edit_profile.php'"> <span>Edit Profile</span> <i class="fa fa-user-plus"></i></button>
                                <button class="btn btn-pink waves-effect waves-light" onclick="location.href='admin_change_password.php'"> <span>Change Password</span> <i class="fa fa-lock"></i> </button>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>

                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-4">
                            
                            <div class="card-box m-t-20">
                                <h4 class="m-t-0 header-title"><b>Personal Information</b></h4>
                                <div class="p-20">
                                    <div class="about-info-p">
                                        <strong>Full Name</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $rows['name'];?></p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Mobile</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $rows['phone'];?></p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Email</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $rows['email'];?></p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Location</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $rows['country'];?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Personal-Information -->
                            <!-- <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Biography</b></h4>
                                
                                <div class="p-20">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                                    <p><strong>But also the leap into electronic typesetting, remaining essentially unchanged.</strong></p>

                                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                            </div> -->
                            <!-- Personal-Information -->
                            
                            
                            <!-- Personal-Information -->
                            <!-- <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Skills</b></h4>
                                
                                <div class="p-20">
                                    <div class="m-b-15">
                                        <h5>Angular Js <span class="pull-right">60%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-b-15">
                                        <h5>Javascript <span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-pink wow animated progress-animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                                <span class="sr-only">90% Complete</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-b-15">
                                        <h5>Wordpress <span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-purple wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-b-0">
                                        <h5>HTML5 &amp; CSS3 <span class="pull-right">95%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info wow animated progress-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
                                                <span class="sr-only">95% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Personal-Information -->
                            
                                                
                                                
                        </div>
                        
                        
                        <div class="col-md-8">
                            
                            <!-- <div class="card-box m-t-20">
                                <h4 class="m-t-0 header-title"><b>Activity</b></h4>
                                <div class="p-20">
                                    <div class="timeline-2">
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="text-muted">5 minutes ago</div>
                                                <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                            </div>
                                        </div>
    
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="text-muted">30 minutes ago</div>
                                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                            </div>
                                        </div>
    
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="text-muted">59 minutes ago</div>
                                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                            </div>
                                        </div>
    
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="text-muted">5 minutes ago</div>
                                                <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                            </div>
                                        </div>
    
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="text-muted">30 minutes ago</div>
                                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                            </div>
                                        </div>
    
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="text-muted">59 minutes ago</div>
                                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            
                            <div class="card-box">
                                <h4 class="m-t-0 m-b-20 header-title"><b>My Location</b></h4>
                                
                                <div class="gmap">
                                    <iframe height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                            src="http://maps.google.co.in/maps?f=q&amp;q=<?php echo $rows['city'];?>&amp;z=15&amp;output=embed"></iframe>
                                </div>
                                <br/>
                                <div class="gmap-info">
                                    <h4><b><a href="#" class="text-dark"><?php echo $rows['name'];?></a></b></h4>
                                    <p><address>
                                     <?php echo $rows['city'];?><br>
                                     <?php echo $rows['country'];?>
                                     </address> </p>
                                   
                                    
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="row">
                        
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
    
    </body>
</html>