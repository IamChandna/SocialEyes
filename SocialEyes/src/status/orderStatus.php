<?php
/*
 * @author ilaya
 * needs more feature updates
 */
session_start();
include '../postgres/query.php';
$o=new query();
$result=array();
$result=$o->getStatusLocalForUid($_SESSION['user']['id'],intval($_POST['offset']));
$i=0;
include '../../web/php/generateCard.php';
while($row=$result[$i])
{
	generateCard($row);
	$i=$i+1;
}