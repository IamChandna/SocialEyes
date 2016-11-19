<?php
include_once '../postgres/query.php';
include_once '../notifications/notification.php';
$o = new query ();
$cid=$o->getConvidForChat($_POST['from'], $_POST['to']);
$o->putMessage($_POST['from'], "Hi!",$cid);

$n=new notification();
$n->messaged($_POST['from'], $_POST['to'],"Hi!",$cid);

