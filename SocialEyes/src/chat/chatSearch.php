<?php
session_start();
include_once '../postgres/query.php';
$o=new query();

if($_POST['keyword'])
$friends=$o->getFriendsForUidKeyword($_POST['uid'], $_POST['keyword']);
else 
$friends=array();

foreach ($friends as $friend){
	?>
	<div class="row well"onclick="openChatWindow(<?php echo $_SESSION['user']['id'].",".$friend[1] ?>)">
		<div class="col-xs-3 col-xs-offset-1 chat-profile-pic">
			<img alt=":P" src="../../src/postgres/<?php echo $o->getPiclinkForPidFromGallery($friend[2]);?>">
		</div>
		<div class="col-xs-7 chat-usernames">
			<label><?php echo $friend[0];?></label>
		</div>
	</div>
	<?php 
}