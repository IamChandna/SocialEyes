<link rel="stylesheet" href="<?php echo $root;?>css/chat.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div class="chat" id="chat">
	<div class="container-fluid">

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 "
				style="background-color: #cc0d0d;">
				<div class="top-buffer10">
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<p>
						
						
						<h5>Chat</h5>
						</p>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="input-group">
							<button class="btn btn-default btn-sm" type="button">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</button>
							</span>
						</div>
						<!-- /input-group -->
					</div>
					<!-- /.col-lg-4 -->
					<br>
					<div class="top-buffer20">
						<div class="chatblock" style="background-color: #f3f3f3;">
							<iframe src="<?php echo $root;?>../web/php/chatBlock.php" width="100%" id="chatframe" style="height:1000px"></iframe>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
document.addEventListener("mouseover", setChatFrame);
function setChatFrame(){
	document.getElementById("chatframe").style.height=$(document).height()700+"px";
}
</script>