<?php
session_start ();
if (! isset ( $_SESSION ['user'] )) {
	header ( 'Location: login.php' );
	exit ( 0 );
}
$root = "../";

$uri = ($_SERVER ['REQUEST_URI']);
$exploaded = explode ( "/", $uri );
$lastParamLoc = sizeof ( $exploaded );
$id = $exploaded [$lastParamLoc - 1];

?>
<!DOCTYPE html>
<!--demo conflict-->
<html>
<head>
<meta charset="ISO-8859-1">
<title>SocialEyes</title>
<link rel="stylesheet" href="../css/normalize.css" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/profile.css" />
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link href="../css/jquery-ui.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/toastr.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/toastr.min.js"></script>
<script src="../js/pusher.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/status.js"></script>

</head>
<body>
		 <?php include "../php/topNavBar.php";?>
		 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"
		style="margin-top: 3.5em;">
		<div class="main-content">
		 	<?php
				include '../../src/postgres/query.php';
				$o = new query ();
				?>
			<div class="Container coverpic" style="background-image: url('../../src/postgres/<?php echo $o->getCoverpicForUid($id);?>');">
				<div class="btn btn-primary" id="buttonStyle">
					Follow <i class="fa fa-user-plus"></i>
				</div>
			</div>
			<div class="col-md-4"
				style="height: 1000px; border: black solid 2px;"></div>
			<div class="propic col-sm-3">
				<img alt="propic"
					src="../../src/postgres/<?php echo $o->getPropicForUid($id);?>">
			</div>
			<div class="col-md-offset-1 col-md-7"
				style="height: 1000px; border: black solid 2px;"></div>
		</div>

	</div>
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		<div class="sidebar-nav-fixed pull-right affix">
				<?php include "../php/chat.php"; ?>
			</div>
	</div>

	<script type="text/javascript">var root="<?php echo $root;?>";</script>
	<script>
         $(function() {
            $( "#live-search-box" ).autocomplete({
               source: "<?php echo $root;?>php/liveSearch.php"
            });
         });
      </script>
</body>
</html>