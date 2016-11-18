<?php
session_start ();
if (! isset ( $_SESSION ['user'] )) {
	header ( 'Location: ../login.php' );
	exit ( 0 );
}
$root = "../";
include '../../src/postgres/query.php';
$o = new query ();
$uri = ($_SERVER ['REQUEST_URI']);
$exploaded = explode ( "/", $uri );
$lastParamLoc = sizeof ( $exploaded );
$id = $exploaded [$lastParamLoc - 1];
$_SESSION['user']['root']=$root;
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
<link rel="stylesheet" href="../css/makeStatus.css" />
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link href="../css/jquery-ui.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/toastr.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/toastr.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/pusher.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/status.js"></script>
<script type="text/javascript">var root="../";var off=0;</script>

</head>
<body  onload="loadLocal10(0,<?php echo $id;?>);off+=10;">
		 <?php include "../php/topNavBar.php";?>
		 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"
		style="margin-top: 3.5em;">
		<div class="main-content">
			<div class="Container coverpic" style="background-image: url('../../src/postgres/<?php echo $o->getCoverpicForUid($id);?>');">
				<div class="btn btn-primary" id="buttonStyle">
					Follow <i class="fa fa-user-plus"></i>
				</div>
			</div>
			<div class="col-md-4"
				style="height: 1000px; border: black solid 2px; margin-top:10px;">
				<ul class = "nav nav-tabs">
					<li role = "presentation">
						<a href="#" id="button1Style" onclick="open(1)">About</a>
					</li>
					<li role = "presentation">
						<a href="#" class="active"  id="button2Style" onclick="open(2)">Friends</a>
					</li>
				<!-- <button type="button" class="btn btn-primary btn-lg active" id="button1Style" onclick="open(1)">About</button>
				<button type="button" class="btn btn-primary btn-lg active" id="button2Style" onclick="open(2)">Friends</button> -->

      </div>
			<div class="propic col-sm-3">
				<img alt="propic"
					src="../../src/postgres/<?php echo $o->getPropicForUid($id);?>">
			</div>
			<div class="col-md-offset-1 col-md-7">
        <div id="content-area">
        <div class="main-content">
							<?php include "../../src/status/makeStatus.php";?>
				</div>
      </div>
      <div class="row">
  			<button class="btn btn-primary col-sm-4 col-sm-offset-4"
  				id="buttonStyle" onclick="loadLocal10(off,<?php echo $id;?>);off+=10;">Load more...</button>
  		</div>
      </div>
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
         $(document).ready(function() {
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
     var pusher = new Pusher('39709b3d935be0f19bb0');

     var notificationsChannel = pusher.subscribe('notification-<?php echo $_SESSION['user']['id'];?>');

     notificationsChannel.bind('comment', function(comment) {
         var message = comment.message;
         toastr.info(message);
         var v=document.getElementById("notification-bell");
         var number=Number(v.innerHTML);
         v.innerHTML=String(++number);
     });

      </script>
</body>
</html>
