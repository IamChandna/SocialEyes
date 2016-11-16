<?php
session_start();
include '../postgres/query.php';
$o=new query();
if($_POST['uid']!=$_SESSION['user']['id']){
	echo "1";
	exit(0);
}

$pic=$o->getPicForSid($_POST['sid']);

if(isset($pic))
{
	unlink($o->getPiclinkForPidFromGallery($pic));
	$o->deletePicFromGallery($pic[1]);
}

$o->deleteStatus($_POST['sid']);