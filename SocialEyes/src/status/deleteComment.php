<?php
session_start();
include '../postgres/query.php';
$o=new query();
if($_POST['uid']!=$_SESSION['user']['id']){
	echo "1";
	exit(0);
}

$pic=$o->deleteComment($_POST['cid']);