<?php
// THE LOGOUT PAGE FROM THE SERVER
session_start();
unset($_SESSION['uid'],$_SESSION['name']);
header('Location: ../../web/login.php');