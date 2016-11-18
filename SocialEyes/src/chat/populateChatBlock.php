<?php
/*
 * each $f is
 * Array (
 * [0] => convid /
 * [1] => msgid /
 * [2] => u1/
 * [3] => u2 /
 * )
 *
 * A minute of silence in tribute to this file's parent file ../../web/php/chatBlock.php
 * all of us will always remember it's critical role in development.
 * That file was used in the first demo of the project which ONLY contained
 * placeholders to fool our instructor.
 */
session_start();
include_once '../postgres/query.php';
$o=new query();

$friends=$o->getAllConvidMsgidForUid($_SESSION['user']['id']);

foreach ($friends as $f){
	if($_SESSION['user']['id']==$f[2]){
		$other=$f[3];
	}
	else{
		$other=$f[2];
	}
	?>
	<div id="conversation-<?php echo $f[0];?>">
		<div class="row well"  onclick="chat_expand_collapse(this.nextElementSibling);">
			<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
				<img alt=":P"
					src="../../src/uploads/<?php echo $o->getPropicForUid($other); ?>">
			</div>
			<div class="col-xs-7 chat-usernames">
				<label><?php echo $o->getUnameForUidFromUser($other); ?></label>
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
		</div>
	<?php 
}