<?php
session_start();
include_once '../postgres/query.php';
include_once '../notifications/notification.php';
$o=new query();
$n=new notification();
if($_POST['uname']!=""){
	$o->updateUsername($_SESSION['user']['id'], htmlspecialchars($_POST['uname']));
	$n->alerts($_SESSION['user']['id'], "username updated");
}
if($_POST['email']!=""){
	$o->updateEmailid($_SESSION['user']['id'], htmlspecialchars($_POST['email']));
	$n->alerts($_SESSION['user']['id'], "email updated");
}
if($_POST['opass']!=""&&$_POST['pass']!=""&&$_POST['rpass']==$_POST['pass']){
	if($o->updatePassword($_SESSION['user']['id'], $_POST['pass'],$_POST['opass']))
	$n->alerts($_SESSION['user']['id'], "password updated");
	else 
		$n->alerts($_SESSION['user']['id'], "password wrong try again");
}
header("Location: ../../web/settings.php");
exit(0);