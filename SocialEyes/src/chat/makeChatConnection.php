<?php
include_once '../postgres/query.php';
$o=new query();
echo $o->getConvidForChat($_POST['from'], $_POST['to']);