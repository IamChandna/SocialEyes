<?php
session_start ();
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
	<div id="chats">
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
		<div class="row well">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/defaultPropic.png">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label>names</label>
			</div>
		</div>
	</div>
</body>
</html>