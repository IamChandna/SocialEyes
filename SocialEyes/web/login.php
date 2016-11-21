<?php
session_start ();
if (isset ( $_SESSION ['user'] )) {
	header ( 'Location: home.php' );
	exit ( 0 );
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SocialEyes</title>


<link rel="stylesheet" href="css/normalize.css">

<link rel='stylesheet prefetch'
	href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='css/font-awesome.min.css'>

<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/toastr.min.css">
<script src="js/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js" type="text/javascript"></script>
<script src="js/toastr.min.js"></script>
<script src="js/pusher.min.js"></script>
<script src="js/login.js"></script>
<script type="text/javascript" src="js/particles.min.js"></script>
<script src="js/app.js"></script>

</head>

<body>
	<div id="particles-js"
		style="position: fixed; height: 100%; width: 100%;"></div>
	<!-- Pen Title-->
	<div class="pen-container">
		<div class="pen-title">
			<img alt="logo" src="img/socialeyesLogoOnlyEye.png"
				style="height: 5%; width: 5%;" /> <br /> <br /> <br />

			<h1>
				First step to <span style="color: #cc0d0d; font-size: 64px;">#SocialEyes</span>
			</h1>
		</div>
		<div class="container">
		
			<div class="card"></div>
			<div class="card">
			
				<h1 class="title">Login</h1>
				<form method="post" action="../src/login/signin.php">
					<div class="input-container">
						<input type="email" id="Email" name="Email" required="required"/>
						<label for="Email">Email</label>
						<div class="bar"></div>
					</div>
					<div class="input-container">
						<input type="password" id="Password" name="Password"
							required="required" /> <label for="Password">Password</label>
						<div class="bar"></div>
					</div>
					<div class="button-container">
						<button>
							<span>Go</span>
						</button>
					</div>
					<div class="footer">
						<a href="#">Forgot your password?</a>
					</div>
				</form>
			</div>
			<div class="card alt">
				<div class="toggle" onclick="$('.container').stop().addClass('active');"></div>
				<h1 class="title">
					Register
					<div class="close" onclick="$('.container').stop().removeClass('active');"></div>
				</h1>
				<form method="post" id="reg" action="../src/login/signup.php">
					<div class="input-container" >
						<input type="text" id="Username" name="Username"
							required="required" data-validation="aplhanumeric"/> <label for="Username">Username</label>
						<div class="bar"></div>
					</div>
					<div class="input-container">
						<input type="email" id="Email" name="Email" required="required" data-validation="email" />
						<label for="Email">Email</label>
						<div class="bar"></div>
					</div>
					<div class="input-container">
						<input type="password" id="Password" name="Password"
							required="required" /> <label for="Password">Password</label>
						<div class="bar"></div>
					</div>
					<div class="input-container">
						<input type="password" id="Repeat Password" name="RepeatPassword" data-validation="confirmation" data-validation-confirm="Password"
							required="required" /> <label for="Repeat Password">Repeat
							Password</label>
						<div class="bar"></div>
					</div>
					<div class="button-container">
						<button onclick="register();">
							<span>Next</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#reg").validate({
		    lang:'en',
		    modules:'security,html5'
		  });
		toastr.options = {
				 "closeButton": true,
				 "debug": false,
				 "newestOnTop": false,
				 "progressBar": false,
				 "positionClass": "toast-bottom-left",
				 "preventDuplicates": true,
				 "onclick": null,
				 "showDuration": "300",
				 "hideDuration": "1000",
				 "timeOut": "5000",
				 "extendedTimeOut": "1000",
				 "showEasing": "swing",
				 "hideEasing": "linear",
				 "showMethod": "fadeIn",
				 "hideMethod": "fadeOut"
			 }
	});
	function register(){
		if(document.getElementById("Password")!=document.getElementById("RepeatPassword"))
			toastr.danger("both passwords aren't same");
		else
			document.getElementById("reg").action="../src/login/signup.php";
	}
	</script>
	<!--raja is great-->
</body>
</html>
