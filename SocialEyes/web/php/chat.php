<link rel="stylesheet" href="<?php echo $root;?>css/chat.css" />

<div class="chat" id="chat" style="position:fixed; bottom: 0px; top: 3.5em; padding-left:15px;">
	<div class="container-fluid" style="height:100%;">

		<div class="row" style="height:100%;">
			<div class="col-sm-12 col-md-12 col-lg-12 "
				style=" height:100%; padding: 0px;">
					<iframe src="<?php echo $root;?>../web/php/chatBlock.php"
						width="100%" id="chatframe" style="height:93%;">
					</iframe>
          <div>
						<form class="input-group" role="form" action="../src/chat/chatSearch.php" method="post" id="chatsearch" enctype="multipart/form-data">
							<input type="text" class="form-control" placeholder="Chat"> 
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								</button>
							</span>
							<script src="../js/jquery.min.js"></script>
							<script type="text/javascript">
							$(document).ready(function() {
							$('#keyword').on('input', function() {
							var searchKeyword = $(this).val();
							 if (searchKeyword.length >= 1) {
							 $.post('chatSearch.php', { keywords: searchKeyword }, function(data) {
							 $('ul#content').empty()
							 $.each(data, function() {
							 $('ul#content').append('<li><a href="example.php?id=' + this.id + '">' + this.title + '</a></li>');
							 });
							 }, "json");
							 }
							 });
							 });
							 </script>
						</form>
        </div>
			</div>
		</div>
	</div>
</div>
