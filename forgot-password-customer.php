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
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Customer Reset Password </h3>
				</div>
				<div id="admin-error">
               </div>
				<div class="panel-body">
					<form method="post" action="check-forgot-password-customer.php" role="form" class="text-center" id="forgot-password-admin">
						<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
							</button>
							Enter your <b>Email</b> and instructions will be sent to you!
						</div>
						<div class="form-group m-b-0">
							<div class="input-group">
								<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
								<span class="input-group-btn">
								<input type="hidden" name="btn-forgot-password-admin">
									<button type="submit" class="btn btn-pink w-sm waves-effect waves-light" id="btn-forgot-password">
										Reset
									</button> 
								</span>
							</div>
						</div>

					</form>
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

        	 $("#btn-forgot-password").click(function(event) {
            
             var data = $("#forgot-password-admin").serialize();
                       
                       $.ajax({
                        
                       type : 'POST',
                       url  : 'check-forgot-password-customer.php',
                       data : data,
                       beforeSend: function()
                       { 
                        $("#admin-error").fadeOut();
                        $("#btn-admin-form").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; validating ...');
                       },
                       success :  function(response)
                          {  
                          
                         if(response=="ok"){
                             
                          $("#btn-forgot-password").html('Sending Password ...');
                          //setTimeout(' window.location.href = ".php"; ',4000);
                          $("#admin-error").html('<div class="alert alert-success" role="alert">Please check your inbox and login with new password</div>');
                          setTimeout(' window.location.href = "login.php"; ',4000);
                         }
                         else{
                             
                          $("#admin-error").fadeIn(1000, function(){      
                          $("#admin-error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                               //$("#forgot-password-admin").html('Reset');
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