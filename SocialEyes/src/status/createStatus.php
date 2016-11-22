<?php
session_start ();
$id = "null";
include_once '../postgres/query.php';
$o=new query();

include 'upload.php';

$o->putStatusToStatus($_SESSION ['user'] ['id'], $_POST ['statusText'], $id);

header ( 'Location: ../../web/home.php' );
exit ( 0 );