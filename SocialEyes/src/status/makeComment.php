<?php
include '../postgres/query.php';
$o=new query();
$o->putCommentToStatus($_POST['uid'], $_POST['content'], $_POST['sid']);