<?php
session_start();
include_once '../postgres/query.php';
include_once '../status/periodElapsed.php';
$o = new query ();
$msgs=$o->getMsgUidTimeForConvid($_POST['convid']);

foreach($msgs as $msg){
	$p=periodElapsed(strtotime($msg[2]));
	//$p=strtotime($msg[2]);
	if($_SESSION["user"]["id"]==$msg[0])
	{
		echo "<div class='chat-messages sendermsg one'>".$msg[1]."</div>";
		echo "<div class='chat-messages one' style='font-size:10px;text-align: right;'>".$p."</div>";
	}
	else{
		echo "<div class='chat-messages receivermsg one'>".$msg[1]."</div>";
		echo "<div class='chat-messages one' style='font-size:10px;'>".$p."</div>";
	}
}