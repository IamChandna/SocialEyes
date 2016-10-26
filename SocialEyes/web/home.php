<?php
session_start ();
if (! isset ( $_SESSION ['uid'] )) {
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
	<?php include "php/topNavBar.php";?>
	
	<div class="propic">
		<img src="img/defaultPropic.png">
	</div>
	
	<div class="col-md-6 col-md-offset-3" id="main-content">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</div>
	
</body>
</html>