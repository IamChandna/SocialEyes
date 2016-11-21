<?php
/*
 * @author ilaya
 * to register new users
 */
session_start ();
if (isset ( $_SESSION ['user'] )) {
	header ( 'Location: ../../web/home.php' );
	exit ( 0 );
}
include_once '../postgres/query.php';
include_once '../postgres/credentials.php';
$o = new query ();
if($_POST['RepeatPassword']==$_POST['Password'])
$o->putBasicToUser($_POST ['Username'],$_POST ['Email'],md5 ( $_POST ['Password'] . $salt ));

header ( 'Location: ../../web/login.php' );
exit ( 0 );
?>