<?php
// THE LOGOUT PAGE FROM THE SERVER
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();
header('Location: ../../web/login.php');