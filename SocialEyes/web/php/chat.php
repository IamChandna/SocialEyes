<link rel="stylesheet" href="<?php echo $root;?>css/chat.css" />
<script type="text/javascript" src="js/chatSearch.js"></script>
<div class="chat" id="chat" style="position:fixed; bottom: 0px; top: 3.5em; padding-left:15px;">
	<div class="container-fluid" style="height:100%;">

		<div class="row" style="height:100%;">
			<div class="col-sm-12 col-md-12 col-lg-12 "style=" height:100%; padding: 0px;">
					<iframe src="<?php echo $root;?>../web/php/chatBlock.php"
						width="100%" id="chatframe" style="height:93%;">
					</iframe>					
					<form class="input-group" role="form" id="chatsearch" enctype="multipart/form-data">
						<input type="text" class="form-control" style="width:140%;"id="chat-live-search-box" oninput="chatLiveSearch(<?php echo $_SESSION['user']['id']?>);" placeholder="Chat"> 
					</form>

			</div>
		</div>
	</div>
</div>
