<?php
/*
 * @author ilaya
 * needs more feature updates***
 */
session_start();
include '../postgres/query.php';
$o=new query();
$result=array();
$result=$o->getStatusLocalForUid($_SESSION['user']['id'],intval($_POST['offset']));
$i=0;
include 'generateCard.php';
while($i<sizeof($result))
{
	$row=$result[$i];
	generateCard($row);
	$i=$i+1;
}