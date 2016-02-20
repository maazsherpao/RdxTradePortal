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
					<h3 class="text-center"> Sign Up to <strong class="text-custom">Online Ordering Portal - Trade</strong> </h3>
				</div>
                <!-- error will be shown here ! -->
             <div id="error">
             
             </div>
        <div class="alert alert-success" role="alert" style="display:none;">You have successfully registered</div>
				<div class="panel-body">
					<form class="form-horizontal m-t-20" method="post" id="form-signin" action="check_signin.php">

					<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" name="name" type="text" required="" placeholder="Full Name">
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" name="email" type="email" required="" placeholder="Email">
							</div>
						</div>

						

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" name="password" type="password" required="" placeholder="Password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<div class="checkbox checkbox-primary">
									<input id="checkbox-signup" name="termsConditions"  type="checkbox" checked="checked" required>
									<label for="checkbox-signup">I accept <a href="#">Terms and Conditions</a></label>
								</div>
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
							<input type="hidden" name="btn">
								<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" id="btn-submit" type="submit">
									Register
								</button>
							</div>
						</div>

					</form>

				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						Already have account?<a href="login.php" class="text-primary m-l-5"><b>Sign In</b></a>
					</p>
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
                      $(".form-horizontal").validate({
                          rules:
                       {
                       password: {
                       required: true,
                       },
                       name: {
                                required: true
                                
                                },
                        email: {
                                required: true,
                                email: true
                                },
                        termsConditions : {
                                required: true
                                
                                },
                        
                        },

                           messages:
                        {
                                password:{
                                          required: "please enter your password"
                                         },
                                name: "please enter your name",
                                email: "please enter your email address",
                                termsConditions: "please accept terms and conditions",
                                
                           },
                        submitHandler: submitForm
                           });  
                        /* validation */
                        
                        /* login submit */
                        function submitForm()
                        {  
                           
                       var data = $("#form-signin").serialize();
                        
                       $.ajax({
                        
                       type : 'POST',
                       url  : 'check_signin.php',
                       data : data,
                       beforeSend: function()
                       { 
                        $("#error").fadeOut();
                        $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Registring...');
                       },
                       success :  function(response)
                          {  
                          
                         if(response=="ok"){
                             
                          $("#btn-submit").html('REGISTER');
                          $(".alert-success").show();
                          $(".alert-success").fadeOut(4000);
                          setTimeout(' window.location.href = "login.php"; ',4000);
                         }
                         else{
                             
                          $("#error").fadeIn(1000, function(){      
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                               $("#btn-submit").html('REGISTER');
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