<link rel="stylesheet" href="<?php echo $root;?>css/chat.css" />
<script type="text/javascript" src="<?php echo $root;?>js/chatSearch.js"></script>
<div class="chat" id="chat" style="position:fixed; bottom: 0px; top: 3.5em; padding-left:15px;">
	<div class="container-fluid" style="height:100%;">

		<div class="row" style="height:100%;">
			<div class="col-sm-12 col-md-12 col-lg-12 "
				style=" height:100%; padding: 0px;">
					<iframe src="<?php echo $root;?>../web/php/chatBlock.php"
						width="100%" id="chatframe" style="height:93%;">
					</iframe>
          <div>
						<form class="input-group" role="form" id="chatsearch" enctype="multipart/form-data">
							<input type="text" class="form-control" id="chat-live-search-box" oninput="chatLiveSearch(<?php echo $_SESSION['user']['id']?>);" placeholder="Chat"> 
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								</button>
							</span>
						</form>
        </div>
			</div>
		</div>
	</div>
</div>
