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
<link rel='stylesheet prefetch'
	href='css/font-awesome.min.css'>

<link rel="stylesheet" href="css/login.css">




</head>

<body>

	<!-- Pen Title-->
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
					<input type="text" id="Email" name="Email" required="required" /> <label
						for="Email">Email</label>
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
			<div class="toggle"></div>
			<h1 class="title">
				Register
				<div class="close"></div>
			</h1>
			<form method="post" action="../src/login/signup.php">
				<div class="input-container">
					<input type="text" id="Username" name="Username"
						required="required" /> <label for="Username">Username</label>
					<div class="bar"></div>
				</div>
				<div class="input-container">
					<input type="text" id="Email" name="Email" required="required" /> <label
						for="Email">Email</label>
					<div class="bar"></div>
				</div>
				<div class="input-container">
					<input type="password" id="Password" name="Password"
						required="required" /> <label for="Password">Password</label>
					<div class="bar"></div>
				</div>
				<div class="input-container">
					<input type="password" id="Repeat Password" name="RepeatPassword"
						required="required" /> <label for="Repeat Password">Repeat
						Password</label>
					<div class="bar"></div>
				</div>
				<div class="button-container">
					<button>
						<span>Next</span>
					</button>
				</div>
			</form>
		</div>
	</div>
	<script
		src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script src="js/login.js"></script>
	<!--raja is great-->
</body>
</html>
