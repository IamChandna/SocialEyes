<?php
session_start();
include_once '../postgres/query.php';
include_once '../notifications/notification.php';
$o = new query ();
$msg=trim(htmlspecialchars($_POST['msg']),";");
$o->putMessage($_SESSION["user"]["id"], $msg,$_POST['convid']);

$c=$o->getU1U2ForConvid($_POST['convid']);
$to=0;
if($_SESSION["user"]["id"]==$c[0]){
	$to=$c[1];
}
else{
	$to=$c[0];
}

$n=new notification();
$n->messaged($_SESSION["user"]["id"], $to ,$msg,$_POST['convid']);

echo "<div class='chat-messages sendermsg one'>".$msg."</div>";