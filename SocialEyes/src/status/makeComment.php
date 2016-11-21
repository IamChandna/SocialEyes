<?php
include_once '../postgres/query.php';
include_once '../notifications/notification.php';
$o=new query();
$o->putCommentToStatus($_POST['uid'], htmlspecialchars($_POST['content']), $_POST['sid']);

$n=new notification();
$n->commented($_POST['uid'],$o->getUidForSid($_POST['sid']));