<?php
session_start();
include '../postgres/query.php';
$o=new query();
$status=$o->getStatusForSid($_POST['sid']);
print_r($status);
$o->putStatusToStatus($_POST['uid'], $status[2], $status[3]);
