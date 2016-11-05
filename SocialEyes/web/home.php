<?php
session_start ();
if (! isset ( $_SESSION ['user'] )) {
	header ( 'Location: login.php' );
	exit ( 0 );
}
$root="";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>SocialEyes</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/home.css" />
<script type="text/javascript" src="js/loadStatus.js"></script>

</head>
<body id="body" onload="load10(0);">
		 <?php include "php/topNavBar.php";?>

		 <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
			 <div style="margin-top: 4.5em;"></div>
		 	 <div class="propic">
		 	 	<?php 
		 	 	include '../src/postgres/query.php';
		 	 	$o=new query();
		 	 	echo "<img src=\"../src/uploads/".$o->getPropicForUid($_SESSION['user']['id'])."\">";
		 	 	?>
		 	 </div>
		 </div>

		 <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="margin-top: 4.5em;" id="content-area">
		 	
		 	<div class="main-content">
		 		<?php include "php/makeStatus.php";?>
		 	</div>
	 	
	 	</div>

		<div class="col-xs-3 col-xs-offset-1 col-sm-3  col-sm-offset-1 col-md-3  col-md-offset-1 col-lg-3 col-lg-offset-1">
			<div class="sidebar-nav-fixed pull-right affix">
				<?php include "php/chat.php"; ?>
			</div>
		</div>
		
</body>
</html>
