<?php
session_start ();
if (! isset ( $_SESSION ['user'] )) {
	header ( 'Location: login.php' );
	exit ( 0 );
}
$root = "";
include '../src/postgres/query.php';
$o = new query ();
$_SESSION ['user'] ['root'] = $root;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Search</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/settings.css" />
<link href="css/jquery-ui.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/toastr.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pusher.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/status.js"></script>
<script type="text/javascript">var root="";</script>
<script type="text/javascript" src="js/particles.min.js"></script>
<script src="js/app.js"></script>
</head>
<body>
	<div id="particles-js"
		style="position: fixed; height: 100%; width: 100%;"></div>
	<?php include "php/topNavBar.php";?>
	<?php 
		$people=$o->getPersonForKeyword($_GET['key']);
		
		/*
		 * each $people is
		 * Array (
		 * [0] => uname /
		 * [1] => uid /
		 * [2] => profilepicid/
		 * [3] => emailid/
		 * [4] => dob/
		 * [5] => nation/
		 * [6] => hobbies/
		 * )
		 */
 
	?>
	<div
		class="col-xs-8 col-xs-offset-1 col-sm-8 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1"
		style="padding-top: 5em;">
		<?php 
		foreach ($people as $person){
			?>
			<div class="row well" style='background-image:url("../src/chat/<?php echo $o->getCoverpicForUid($person[1]);?>");opacity: 0.8; height:10em; margin-bottom:1em;'>
				<a href="profile/<?php echo $person[1];?>"></a>
				<div class="col-md-3 propic-container">
					<img alt=":P" src="../src/chat/<?php echo $o->getPiclinkForPidFromGallery($person[2]);?>" style="width: 10em;height:10em; border-radius: 5em;" >
				</div>
				<div class=" well col-md-6 names" style="padding-right:2em;">
					<div class="col-md-12 names" style='color:black;'>
						<h1><a href="profile/<?php echo $person[1];?>"><?php echo $person[0];?></a></h1>
					</div>
					<div class="col-md-12 names">
						<a href="profile/<?php echo $person[1];?>"><?php echo $person[3];?></a>
					</div>
				</div>
				<div class="well col-md-3 names" style="height:7.6em;">
					<div class="col-md-12 names">
						<h5><a href="profile/<?php echo $person[1];?>"><?php echo $person[4];?></a></h5>
					</div>
					<div class="col-md-12 names">
						<h5><a href="profile/<?php echo $person[1];?>"><?php echo $person[5];?></a></h5>
					</div>
					<div class="col-md-12 names">
						<h5><a href="profile/<?php echo $person[1];?>"><?php echo $person[6];?></a></h5>
					</div>
				</div>
			</div>
			<?php 
		}
		?>
		
	</div>


	<div style="padding-left: 0px;"
		class="col-xs-2 col-xs-offset-1 col-sm-2 col-sm-offset-1 col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1">
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
            	 generateChatHistory();
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
     notificationsChannel.bind('message', function(message) {
         var msg = emojione.unicodeToImage(message.msg);
         var convid = message.convid;
		 var from = message.from;
		 if(document.getElementById("messaging-"+convid).className.includes("toggle")){
			//chat window open do somthing
			var resp="<div class='chat-messages receivermsg one'>"+msg+"</div>";
			document.getElementById("previouschats"+convid).innerHTML += resp;
			scrollToBottom(convid);
		 }
		 else{
			 //chat window closed
			 var i=document.getElementById("conversation-badge-"+convid).innerHTML||0;
			 i++;
			 document.getElementById("conversation-badge-"+convid).innerHTML=i;
		 }
     });
     notificationsChannel.bind('follow', function(follow) {
         var message = follow.message;
         toastr.info(message);
         var v=document.getElementById("notification-bell");
         var number=Number(v.innerHTML);
         v.innerHTML=String(++number);
     });
      </script>

</body>
</html>
