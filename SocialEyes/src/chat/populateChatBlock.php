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
session_start ();
include_once '../postgres/query.php';
$o = new query ();
$root = $_SESSION ['user'] ['root'];
$friends = $o->getAllConvidMsgidForUid ( $_SESSION ['user'] ['id'] );

foreach ( $friends as $f ) {
	if ($_SESSION ['user'] ['id'] == $f [2]) {
		$other = $f [3];
	} else {
		$other = $f [2];
	}
	?>
<div id="conversation-<?php echo $f[0];?>">
	<div class="row well"
		onclick="chat_expand_collapse(this.nextElementSibling,<?php echo $f[0];?>);">
		<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
			<img alt=":P"
				src="<?php echo $root;?>../src/uploads/<?php echo $o->getPropicForUid($other); ?>">
		</div>
		<div class="col-xs-7 chat-usernames">
			<label><?php echo $o->getUnameForUidFromUser($other); ?>
			<span class="badge" id="conversation-badge-<?php echo $f[0];?>"></span>
			</label>
		</div>
	</div>
	<div class="row messaging" id="messaging-<?php echo $f[0];?>">
		<div class="well"
			style="margin: 0px 7px 5px 2px; padding-bottom: 3px;">
			<div id="previouschats<?php echo $f[0];?>" style="height: 13em; overflow-y:scroll;">
			
			</div>
			<div class="input-group" style="margin-left: -5px">
				<input type="text" id="message-box-<?php echo $f[0];?>"class="form-control message-box" placeholder="Write a message...">
					<span class="input-group-btn">
						<button class="btn btn-default btn-md" onclick="sendMessage(document.getElementById('message-box-<?php echo $f[0];?>'),<?php echo $f[0];?>);" type="button">
							<span class="glyphicon glyphicon-send" aria-hidden="true" style="padding: 3px;"></span>
						</button>
				</span>
				<div id="emoji-container"></div>
			</div>
		</div>
	</div>
</div>
<?php
}