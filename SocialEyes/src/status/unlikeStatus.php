<?php
session_start();
include '../postgres/query.php';
$o=new query();
$o->updateNotLikeInStatus($_POST['uid'], $_POST['sid']);