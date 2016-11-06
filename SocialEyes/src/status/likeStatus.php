<?php
session_start();
include '../postgres/query.php';
$o=new query();
$o->updateLikeInStatus($_POST['uid'], $_POST['sid']);