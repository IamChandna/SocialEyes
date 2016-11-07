<?php
include '../postgres/query.php';
$o=new query();
$o->updateLikeInComment($_POST['uid'], $_POST['cid']);