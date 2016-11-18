<?php
/*
 * @author ilaya
 * needs more feature updates***
 */
session_start();
include_once '../postgres/query.php';
$o=new query();
$result=array();
$result=$o->getStatusOfUid($_POST['uid'],intval($_POST['offset']));
$i=0;
include_once 'periodElapsed.php';
include_once 'generateCard.php';
while($i<sizeof($result))
{
	$row=$result[$i];
	generateCard($row,$_SESSION['user']['root']);
	$i=$i+1;
}
