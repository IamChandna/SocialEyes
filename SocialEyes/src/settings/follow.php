<?php
include_once '../postgres/query.php';
include_once '../notifications/notification.php';
$o=new query();
$o->putFriendInFriendlistOfUsers($_POST['from'], $_POST['to']);

$n=new notification();
$n->followed($_POST['from'],$_POST['to']);