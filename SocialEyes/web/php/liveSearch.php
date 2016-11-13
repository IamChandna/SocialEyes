<?php
include_once '../../src/postgres/query.php';
$o=new query();
$result=$o->getFriendsForKeyword($_GET['term']);
echo json_encode($result);
 