<?php
include '../postgres/query.php';
$o = new query ();
$messages=$o->getNotifications($_POST['uid']);
$o->updateSeenInNotifications($_POST['uid']);
foreach ($messages as $message){
	echo "<li style='padding:5px; width:200px;'>".$message."</li>";
}