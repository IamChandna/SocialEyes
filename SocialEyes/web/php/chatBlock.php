<?php
session_start ();
if (! isset ( $_SESSION ['user'] )) {
	header ( 'Location: ../login.php' );
	exit ( 0 );
}
$x=0;
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/chat.css">
<link rel="stylesheet" href="../css/emojionearea.min.css">
<script type="text/javascript" src="../js/emojionearea.min.js"></script>
<script type="text/javascript" src="../js/chatBlock.js"></script>
<script src="../js/jquery.min.js"></script>
</head>
<body>

	<div id="items"></div>
	<div id="chats">
		<div class="row well"  onclick="chat_expand_collapse(this.nextElementSibling);">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>Jai Pal Singh</label>
			</div>
		</div>
		<div class="row" id="messaging">
		<div class="well" style=" margin:0px 7px 5px 7px;">
			<div id="previouschats" style="height: 13em;">
			
			</div>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Write a message..."
						id="message-box"> <span class="input-group-btn">
						<button class="btn btn-default btn-md" type="button">
							<span class="glyphicon glyphicon-send" aria-hidden="true" style="padding:3px;"></span>
						</button>
					</span>
					<div id="emoji-container"></div>
				</div>
		</div>
		</div>
		
		<div class="row well"  onclick="chat_expand_collapse(this.nextElementSibling);">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>Megha</label>
			</div>
		</div>
		<div class="row" id="messaging">
		<div class="well" style=" margin:0px 7px 5px 7px;">
			<div id="previouschats" style="height: 13em;">
			
			</div>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Write a message..."
						id="message-box2"> <span class="input-group-btn">
						<button class="btn btn-default btn-md" type="button">
							<span class="glyphicon glyphicon-send" aria-hidden="true" style="padding:3px;"></span>
						</button>
					</span>
					<div id="emoji-container"></div>
				</div>
		</div>
		</div>
		
		<div class="row well"  onclick="chat_expand_collapse(this.nextElementSibling);">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>Ilayaraja</label>
			</div>
		</div>
		<div class="row" id="messaging">
		<div class="well" style=" margin:0px 7px 5px 7px;">
			<div id="previouschats" style="height: 13em;">
			
			</div>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Write a message..."
						id="message-box1"> <span class="input-group-btn">
						<button class="btn btn-default btn-md" type="button">
							<span class="glyphicon glyphicon-send" aria-hidden="true" style="padding:3px;"></span>
						</button>
					</span>
					<div id="emoji-container"></div>
				</div>
		</div>
		</div>
		
		
<!-- 		<div class="row well"> -->
<!-- 			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic"> -->
<!-- 				<img alt=":P" -->
<!-- 					src="../../src/uploads/defaultPropic.png"> -->
<!-- 			</div> -->
<!-- 			<div class="col-xs-7 chat-usernames"> -->
<!-- 				<label>names</label> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div class="row well"> -->
<!-- 			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic"> -->
<!-- 				<img alt=":P" -->
<!-- 					src="../../src/uploads/defaultPropic.png"> -->
<!-- 			</div> -->
<!-- 			<div class="col-xs-7 chat-usernames"> -->
<!-- 				<label>names</label> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div class="row well"> -->
<!-- 			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic"> -->
<!-- 				<img alt=":P" -->
<!-- 					src="../../src/uploads/defaultPropic.png"> -->
<!-- 			</div> -->
<!-- 			<div class="col-xs-7 chat-usernames"> -->
<!-- 				<label>names</label> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div class="row well"> -->
<!-- 			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic"> -->
<!-- 				<img alt=":P" -->
<!-- 					src="../../src/uploads/defaultPropic.png"> -->
<!-- 			</div> -->
<!-- 			<div class="col-xs-7 chat-usernames"> -->
<!-- 				<label>names</label> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div class="row well"> -->
<!-- 			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic"> -->
<!-- 				<img alt=":P" -->
<!-- 					src="../../src/uploads/defaultPropic.png"> -->
<!-- 			</div> -->
<!-- 			<div class="col-xs-7 chat-usernames"> -->
<!-- 				<label>names</label> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div class="row well"> -->
<!-- 			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic"> -->
<!-- 				<img alt=":P" -->
<!-- 					src="../../src/uploads/defaultPropic.png"> -->
<!-- 			</div> -->
<!-- 			<div class="col-xs-7 chat-usernames"> -->
<!-- 				<label>names</label> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div class="row well"> -->
<!-- 			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic"> -->
<!-- 				<img alt=":P" -->
<!-- 					src="../../src/uploads/defaultPropic.png"> -->
<!-- 			</div> -->
<!-- 			<div class="col-xs-7 chat-usernames"> -->
<!-- 				<label>names</label> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div class="row well"> -->
<!-- 			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic"> -->
<!-- 				<img alt=":P" -->
<!-- 					src="../../src/uploads/defaultPropic.png"> -->
<!-- 			</div> -->
<!-- 			<div class="col-xs-7 chat-usernames"> -->
<!-- 				<label>names</label> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 		<div class="row well"> -->
<!-- 			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic"> -->
<!-- 				<img alt=":P" -->
<!-- 					src="../../src/uploads/defaultPropic.png"> -->
<!-- 			</div> -->
<!-- 			<div class="col-xs-7 chat-usernames"> -->
<!-- 				<label>names</label> -->
<!-- 			</div> -->
<!-- 		</div> -->
	</div>
	<script type="text/javascript">
  $(document).ready(function() {
    $("#message-box").emojioneArea();
  });
</script>
</body>
</html>