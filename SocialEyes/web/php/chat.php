<link rel="stylesheet" href="<?php echo $root;?>css/chat.css" />

<div class="chat" id="chat" style="position:fixed; bottom: 0px; top: 3.5em; padding-left:15px;">
	<div class="container-fluid" style="height:100%;">

		<div class="row" style="height:100%;">
			<div class="col-sm-12 col-md-12 col-lg-12 "
				style=" height:100%; padding: 0px;">
					<iframe src="<?php echo $root;?>../web/php/chatBlock.php"
						width="100%" id="chatframe" style="height:100%;">
						
					</iframe>
			</div>
		</div>
	</div>
</div>