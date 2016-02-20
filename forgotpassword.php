<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<title>RDX TRADE SYSTEM</title>

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
					<h3 class="text-center"> Reset Password </h3>
				</div>

				<div id="error">
             
             </div>
        <div class="alert alert-success" role="alert" style="display:none;">Your password has been sent to your email address</div>

				<div class="panel-body">
					<form method="post" id="form-forgotpass" action="send_password.php" role="form" class="text-center">
						<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
							</button>
							Enter your <b>Email</b> and instructions will be sent to you!
						</div>
						<div class="form-group m-b-0">
							<div class="input-group">
							<input type="hidden" name="btn">
								<input type="email" class="form-control" placeholder="Enter Email" name="email">
								<span class="input-group-btn">
									<button type="submit" id="btn-submit" class="btn btn-pink w-sm waves-effect waves-light">
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
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js" type="text/javascript"></script>
        <script type="text/javascript">
         $('document').ready(function()
                    { 

                         /* validation */
                      $("#form-forgotpass").validate({
						  rules: {
						      email: {
						      required: true,
						      email: true
						    }
						  },
						  messages: {
						      email: {
						      required: "Email Address"
						      
						    }
						  },
						 submitHandler: submitForm
						 });  
						                       
                        /* validation */
                        
                        /* login submit */
                        function submitForm()
                        {  
                           
                       var data = $("#form-forgotpass").serialize();
                        
                       $.ajax({
                        
                       type : 'POST',
                       url  : 'send_password.php',
                       data : data,
                       beforeSend: function()
                       { 
                        $("#error").fadeOut();
                        $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Sending...');
                       },
                       success :  function(response)
                          {  
                          
                         if(response=="ok"){
                             
                          $("#btn-submit").html('Reset');
                          $(".alert-success").show();
                          //$(".alert-success").fadeOut(4000);
                          //setTimeout(' window.location.href = "login.php"; ',4000);
                         }
                         else{
                             
                          $("#error").fadeIn(1000, function(){      
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                               $("#btn-submit").html('Reset');
                             });
                         }
                         }
                       });
                        return false;
                      }
                        /* login submit */
                    });
        </script>
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