<link rel="stylesheet" href="<?php echo $root;?>css/chat.css" />
<link rel="stylesheet"
	href="<?php echo $root;?>css/emojionearea.min.css">
<script type="text/javascript"
	src="<?php echo $root;?>js/emojionearea.min.js"></script>
<script type="text/javascript"
	src="<?php echo $root;?>js/chatBlock.js"></script>
<script type="text/javascript" src="<?php echo $root;?>js/chatSearch.js"></script>
<script type="text/javascript"
	src="<?php echo $root;?>js/emojione.min.js"></script>
<link rel="stylesheet" href="<?php echo $root;?>css/chat-messages.css" />
<div class="chat col-md-2" style="height: 100%; padding:0px;">
<!-- 	id="chat" style="position: fixed; bottom: 0px; top: 3.5em;"> -->
	<div class="container-fluid" style="height: 100%;">

		<div class="row" style="height: 100%;">
			<div class=""
				style="height: 100%; padding: 0px;">
				<!--iframe src="<?php echo $root;?>../web/php/chatBlock.php"
						width="100%" id="chatframe" style="height:93%;">
					</iframe-->
				<div
					style="height: 95%; width: 100%; background-color: #fff; border-left: 1px solid grey;
					padding-left: 15px; margin-top: 3.7em; margin-bottom: -3.5em; overflow-x: visible;">
					<div id="items"></div>
					<div id="chats">
						
					</div>
				</div>
				<form class="input-group" role="form" id="chatsearch"
					enctype="multipart/form-data">
					<input type="text" class="form-control" style="width: 146%;"
						id="chat-live-search-box"
						oninput="chatLiveSearch(<?php echo $_SESSION['user']['id']?>);"
						placeholder="Begin a new chat...">
				</form>

			</div>
		</div>
	</div>
</div>