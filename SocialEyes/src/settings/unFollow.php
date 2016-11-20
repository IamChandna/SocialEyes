<?php
include_once '../postgres/query.php';
include_once '../notifications/notification.php';
$o=new query();
$o->deleteFriendInFriendlistOfUsers($_POST['from'], $_POST['to']);
