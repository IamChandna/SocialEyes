<?php 
session_start();
if (! isset ( $_SESSION ['user'] )) {
	header ( 'Location: ../login.php' );
	exit ( 0 );
}
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/chat.css">
</head>
<body>

<div id="items"></div>

</body>
</html>