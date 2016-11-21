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
$_SESSION ['user'] ['root'] = $root;
$friends = $o->getFriendsForUid ( $_SESSION['user']['id'] );
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
<body>
		 <?php include "../php/topNavBar.php";?>
		 <?php print_r(in_array($id,$friends));?>
		 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"
		style="margin-top: 3.5em;">
		<div class="cover-pic-container">
			<div class="Container coverpic" style="background-image: url('../../src/postgres/<?php echo $o->getCoverpicForUid($id);?>');">
				<?php if(in_array($id, $friends)==1)
				{?>	
				<div class="btn btn-primary toggl" id="buttonStyle" onclick="toggleFollow(<?php echo $_SESSION['user']['id'].",".$id;?>,this);">
					Unfollow <i class="fa fa-user-times"></i>
				</div>
				<?php }
				else if($id!=$_SESSION['user']['id'])
				{?>
				<div class="btn btn-primary" id="buttonStyle" onclick="toggleFollow(<?php echo $_SESSION['user']['id'].",".$id;?>,this);">
					Follow <i class="fa fa-user-plus"></i>
				</div>
				<?php }
				?>
			</div>

			<div class="col-md-4" style="height: 1000px; margin-top: 10px;">

				<div class="jumbotron jumbotron-fluid"
					style="background-color: #fff; margin-top: 0px;">
					<div class="container">
						<ul class="nav nav-tabs">
							<li role="presentation"><button id="button1Style"
									class="btn btn-primary"
									onclick="$('.bio-sect').removeClass('toggle');">
									Info <i class="fa fa-address-book-o"></i>
								</button></li>
							<li role="presentation"><button id="button2Style"
									class="btn btn-primary"
									onclick="$('.bio-sect').addClass('toggle');">
									Following <i class="fa fa-users"></i>
								</button></li>
						</ul>
								<?php
								$bio = $o->getBiodataForUidFromUsers ( $id );
								/*
								 * [0] => uname
								 * [1] => emailid
								 * [2] => dob
								 * [3] => sex
								 * [4] => phone
								 * [5] => nation
								 * [6] => hobbies
								 */
								?>
									<div class="bio-sect">
							<div class="about">
								<div class="row">
									<h4>
										<i class="fa fa-street-view" style="color: #999999;"></i>
										&nbsp; I am <em style="color: #cc0d0d"> <?php echo $bio[0];?> </em>
									</h4>
								</div>
								<div class="row">
									<h4>
										<i class="fa fa-birthday-cake" style="color: #999999;"></i>
										&nbsp; Born on <em style="color: #cc0d0d"><?php echo $bio[2];?> </em>
									</h4>
								</div>
								<div class="row">
									<h4>
										<i class="fa fa-venus-mars" style="color: #999999;"></i>&nbsp;
										<em style="color: #cc0d0d"><?php echo $bio[3];?> </em>
									</h4>
								</div>
								<div class="row">
									<h4>
										<i class="fa fa-home" style="color: #999999;"></i> &nbsp;
										Lives in <em style="color: #cc0d0d"> <?php echo $bio[5];?> </em>
									</h4>
								</div>
								<div class="row">
									<h4>
										<i class="fa fa-child" style="color: #999999;"></i>&nbsp;
										&nbsp; Love to do <em style="color: #cc0d0d"><?php echo $bio[6];?> </em>
									</h4>
								</div>
								<div class="row">
									<h4>
										<i class="fa fa-envelope-open" style="color: #999999;"></i>&nbsp;
										Mail me on <em style="color: #cc0d0d"><?php echo $bio[1];?> </em>
									</h4>
								</div>
								<div class="row">
									<h4>
										<i class="fa fa-phone" style="color: #999999;"></i> &nbsp;
										Call me on <em style="color: #cc0d0d"><?php echo $bio[4];?> </em>
									</h4>
								</div>
							</div>


							<div class="friends">

								<div class="row">
										<?php
										$friends = $o->getFriendsForUid ( $id);
										foreach ( $friends as $uid ) {
											?>
										     <div class="col-sm-6 col-md-4 friends-cards" style="float: left; height:150px;">
												<div class="thumbnail" style="height: 100%;">
													<a class="friend" href="../profile/<?php echo $uid;?>">
														<img src="../../src/uploads/<?php echo $o->getPropicForUid($uid); ?>"
														alt="missing image" style="border-radius: 50%;"></a>
														<div class="caption" style="padding-bottom: 0px; padding-top: 0px;">
															<h5 style="color: #cc0d0d;"><?php echo $o->getUnameForUidFromUser($uid); ?></h5>
														</div>
												</div>
											</div>
										 <?php }?>
									 </div>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="propic col-sm-3">
			<img alt="propic"
				src="../../src/postgres/<?php echo $o->getPropicForUid($id);?>">
		</div>
		<div class="col-md-offset-1 col-md-7" style="margin-top: 10px;">
			<div id="content-area">
				<div class="main-content">
							<?php include "../../src/status/makeStatus.php";?>
				</div>
			</div>
			<div class="row">
				<button class="btn btn-primary col-sm-4 col-sm-offset-4"
					id="buttonStyle"
					onclick="loadLocal10(off,<?php echo $id;?>);off+=10;">Load more...</button>
			</div>
		</div>
	</div>

	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"
		style="padding-left: 0px;">
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
        	 loadLocal10(0,<?php echo $id;?>);
        	 off+=10;
        	 generateChatHistory();
        	 $(".message-box").emojioneArea();
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

