<?php
session_start();
include_once '../postgres/query.php';
$o=new query();
if(isset($_POST['dob'])){
	$o->updateDOB($_SESSION['user']['id'], $_POST['dob']);
}
if(isset($_POST['sex'])){
	$o->updateSex($_SESSION['user']['id'], $_POST['sex']);
}
if(isset($_POST['phone'])){
	$o->updatePhone($_SESSION['user']['id'], $_POST['phone']);
}
if(isset($_POST['nation'])){
	$o->updateNation($_SESSION['user']['id'], $_POST['nation']);
}
if(isset($_POST['hobbies'])){
	$o->updateHobbies($_SESSION['user']['id'], $_POST['hobbies']);
}
header("Location: ../../web/settings.php");
exit(0);