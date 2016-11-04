<?php
session_start ();
if (! isset ( $_SESSION ['user'] )) {
	header ( 'Location: login.php' );
	exit ( 0 );
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>SocialEyes</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/home.css" />
</head>
<body>
	<div class = "container-fluid">
	 <div class = "row">
		 <?php include "php/topNavBar.php";?>

		 <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
			 <div style="margin-top: 4.5em;"></div>
		 	 <div class="propic">
		 		<img src="img/defaultPropic.png">
		 	 </div>
		 </div>

		 <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" id="main-content">
	 	<?php include "php/makeStatus.php";?>
	 	</div>

		<div class="col-xs-3 col-xs-offset-1 col-sm-3  col-sm-offset-1 col-md-3  col-md-offset-1 col-lg-3 col-lg-offset-1">
			<div class="sidebar-nav-fixed pull-right affix">
				<?php include "php/chat.php"; ?>
			</div>
		</div>

	 </div>
 </div>
</body>
</html>
