<?php
session_start();
include_once '../postgres/query.php';
include_once '../notifications/notification.php';
$o=new query();
$n=new notification();
echo "<script>var msg='';</script>";
if($_POST['uname']!=""){
	$o->updateUsername($_SESSION['user']['id'], htmlspecialchars($_POST['uname']));
	echo "<script>msg+='username updated';</script>";
}
if($_POST['email']!=""){
	$o->updateEmailid($_SESSION['user']['id'], htmlspecialchars($_POST['email']));
	echo "<script>msg+='email updated';</script>";
}
if($_POST['opass']!=""&&$_POST['pass']!=""&&$_POST['rpass']==$_POST['pass']){
	if($o->updatePassword($_SESSION['user']['id'], $_POST['pass'],$_POST['opass'])){
	echo "<script>msg+='password updated';</script>";
	}
	else {
		echo "<script>msg+='password wrong try again';</script>";
	}
}

echo "<script>alert(msg);window.location='../../web/settings.php';</script>";