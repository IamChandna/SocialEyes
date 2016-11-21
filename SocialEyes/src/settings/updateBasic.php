<?php
session_start();
include_once '../postgres/query.php';
$o=new query();
if($_POST['uname']!=""){
	$o->updateUsername($_SESSION['user']['id'], $_POST['uname']);
}
if($_POST['email']!=""){
	$o->updateEmailid($_SESSION['user']['id'], $_POST['email']);
}
if($_POST['opass']!=""&&$_POST['pass']!=""&&$_POST['rpass']==$_POST['pass']){
	$o->updatePassword($_SESSION['user']['id'], $_POST['pass'],$_POST['opass']);
}
header("Location: ../../web/settings.php");
exit(0);