<?php
session_start ();
if (! isset ( $_SESSION ['user'] )) {
	header ( 'Location: login.php' );
	exit ( 0 );
}
$root = "";
include '../src/postgres/query.php';
$o = new query ();
$_SESSION['user']['root']=$root;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>SocialEyes</title>
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/home.css" />
<link href="css/jquery-ui.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/toastr.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/pusher.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/status.js"></script>
<script type="text/javascript">var root="";var off=0;</script>


<body id="body" onload="load10(0);off+=10;">
		 <?php include "php/topNavBar.php";?>

		 <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
		<div style="margin-top: 4.5em;"></div>
		<div class="propic">
		 	 	<?php
						echo "<img src=\"../src/uploads/" . $o->getPropicForUid ( $_SESSION ['user'] ['id'] ) . "\">";
						?>
		 	 </div>
	</div>

	<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"
		style="margin-top: 4.5em;">
		<div id="content-area">
			<div class="main-content">
		 		<?php include "../src/status/makeStatus.php";?>
		 	</div>
		</div>
		<div class="row">
			<button class="btn btn-primary col-sm-4 col-sm-offset-4"
				id="buttonStyle" onclick="load10(off);off+=10;">Load more...</button>
		</div>
	</div>

	<div style="padding-left: 0px;"
		class="col-xs-2 col-xs-offset-2 col-sm-2  col-sm-offset-2 col-md-2  col-md-offset-2 col-lg-2 col-lg-offset-2" >
		<div class="sidebar-nav-fixed pull-right affix">
				<?php include "php/chat.php"; ?>
			</div>
	</div>

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
