<?php
include '../postgres/query.php';
$o=new query();
$o->updateNotLikeInComment($_POST['uid'], $_POST['cid']);