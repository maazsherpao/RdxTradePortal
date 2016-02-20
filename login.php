<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>Online Ordering Portal - Trade</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

  </head>
  <body>

        <div class="animationload">
            <div class="loader"></div>
        </div>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    
    
    <div class="container-alt">
      <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="wrapper-page signup-signin-page">
          <div class="card-box">
            <div class="panel-heading">
              <h3 class="text-center"> Welcome to <strong class="text-custom">RDX Online Ordering Portal - Trade</strong></h3>
            </div>
    
            <div class="panel-body">
              <div class="row">
             
              <div class="col-lg-6" style="border-right:1px dashed #ccc;">
               <div id="admin-error">
             
               </div>
                  <div class="p-20">
                    <h4><b>Admin Login</b></h4>
                    <form class="form-horizontal m-t-20" id="admin-form" action="check-admin-login.php" method="post">
                      <div class="form-group ">
                        <div class="col-xs-12">
                          <input class="form-control" name="email" type="email" required="" placeholder="Email Address">
                        </div>
                      </div>
          
                      <div class="form-group">
                        <div class="col-xs-12">
                          <input class="form-control" name="password" type="password" required="" placeholder="Password">
                        </div>
                      </div>
          
                      <!-- <div class="form-group">
                        <div class="col-xs-12">
                          <div class="checkbox checkbox-primary">
                            <input id="checkbox-signin" type="checkbox">
                            <label for="checkbox-signin"> Remember me </label>
                          </div>
          
                        </div>
                      </div> -->
          
                      <div class="form-group m-t-20">
                      <input type="hidden" name="btn-admin-login">
                        <div class="col-xs-12">
                          <button class="btn btn-pink text-uppercase waves-effect waves-light w-sm" id="btn-admin-form" type="submit">
                            Admin Login
                          </button>
                        </div>
                      </div>
                      
                      <div class="form-group m-t-20 m-b-0">
                        <div class="col-sm-12">
                          <a href="forgot-password-admin.php" class="text-dark"> Forgot your password?</a>
                        </div>
                      </div>
          
                    </form>
                  </div>
                </div>
              <div class="col-lg-6">
              <div id="customer-error">
             
               </div>
                  <div class="p-20">
                    <h4><b>Customer Login</b></h4>
                    <form class="form-horizontal m-t-20" id="customer-form" action="check-customer-login.php" method="post">
                      <div class="form-group ">
                        <div class="col-xs-12">
                          <input class="form-control" name="email" type="email" required="" placeholder="Email Address">
                        </div>
                      </div>
          
                      <div class="form-group">
                        <div class="col-xs-12">
                          <input class="form-control" name="password" type="password" required="" placeholder="Password">
                        </div>
                      </div>
          
                      <!-- <div class="form-group ">
                        <div class="col-xs-12">
                          <div class="checkbox checkbox-primary">
                            <input id="checkbox-signin" type="checkbox">
                            <label for="checkbox-signin"> Remember me </label>
                          </div>
          
                        </div>
                      </div> -->
          
                      <div class="form-group m-t-20">
                      <input type="hidden" name="btn-customer-login">
                        <div class="col-xs-12">
                          <button class="btn btn-pink text-uppercase waves-effect waves-light w-sm" type="submit" id="btn-customer-form">
                            Customer Login
                          </button>
                        </div>
                      </div>
                      
                      <div class="form-group m-t-20 m-b-0">
                        <div class="col-sm-12">
                          <a href="forgot-password-customer.php" class="text-dark"> Forgot your password?</a>&nbsp;&nbsp;&nbsp;&nbsp;
                         <!--  <span class="text-right">Don't have an account? <a href="register.php" class="text-primary m-l-5"><b>Sign Up</b></a></span> -->
                        </div>
                      </div>
          
                    </form>
                  </div>
                </div>
                
                
                
              </div>
              
            </div>
          </div>
    
        </div>
      </div>
    </div>
    </div>
    

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

        <script type="text/javascript">

        $(document).ready(function() {

          $("#btn-admin-form").click(function(event) {
            
             var data = $("#admin-form").serialize();
                       
                       $.ajax({
                        
                       type : 'POST',
                       url  : 'check-admin-login.php',
                       data : data,
                       beforeSend: function()
                       { 
                        $("#admin-error").fadeOut();
                        $("#btn-admin-form").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; validating ...');
                       },
                       success :  function(response)
                          {  
                          
                         if(response=="ok"){
                             
                          $("#btn-admin-form").html('Signing In ...');
                          setTimeout(' window.location.href = "index.php"; ',4000);
                         }
                         else{
                             
                          $("#admin-error").fadeIn(1000, function(){      
                          $("#admin-error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                               $("#btn-admin-form").html('Admin Login');
                             });
                         }
                         }
                       });
                        return false;
                      
                        /* login submit */

           
          });

          $("#btn-customer-form").click(function(event) {


            
             var data = $("#customer-form").serialize();
                       
                       $.ajax({
                        
                       type : 'POST',
                       url  : 'check-customer-login.php',
                       data : data,
                       beforeSend: function()
                       { 
                        $("#customer-error").fadeOut();
                        $("#btn-customer-form").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; validating ...');
                       },
                       success :  function(response)
                          {  
                          
                         if(response=="ok"){
                             
                          $("#btn-customer-form").html('Signing In ...');
                          setTimeout(' window.location.href = "customer.php"; ',4000);
                         }
                         else{
                             
                          $("#customer-error").fadeIn(1000, function(){      
                          $("#customer-error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                               $("#btn-customer-form").html('Customer Login');
                             });
                         }
                         }
                       });
                        return false;
                      
                        /* login submit */
           
          });
          
        });

        </script>



  </body>
</html>