<?php
session_start();
include_once '../postgres/query.php';
$o=new query();
print_r($_POST);
if(isset($_POST['uname'])){
	$o->updateUsername($_SESSION['user']['id'], $_POST['uname']);
}
if(isset($_POST['email'])){
	$o->updateEmailid($_SESSION['user']['id'], $_POST['email']);
}
if(isset($_POST['opass'])&&isset($_POST['pass'])&&isset($_POST['rpass'])){
	$o->updatePassword($_SESSION['user']['id'], $_POST['uname'],$_POST['opass']);
}
header("Location: ../../web/settings.php");
exit(0);