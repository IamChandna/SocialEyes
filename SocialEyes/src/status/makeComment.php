<?php
session_start();
include_once '../postgres/query.php';
include_once '../notifications/notification.php';
$o=new query();
$o->putCommentToStatus($_POST['uid'], $_POST['content'], $_POST['sid']);

$n=new notification();
$n->commented($_SESSION['user']['id'], $_POST['uid']);