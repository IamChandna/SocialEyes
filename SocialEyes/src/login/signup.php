<?php
/*
 * @author ilaya
 * to register new users
 */
session_start ();
if (isset ( $_SESSION ['user'] )) {
	header ( 'Location: ../../web/home.php' );
	exit ( 0 );
}
include_once 'databaseConn.php';
include_once 'credentials.php';
$con = databaseConn ();
$query = "insert into jaipal.users(uname,emailid,password) values('" . $_POST ['Username'] . "','" . $_POST ['Email'] . "','" . md5 ( $_POST ['Password'] . $salt ) . "');";
$ret = pg_query ( $con, $query );
if (! $ret) {
	echo pg_last_error ( $db );
} else {
	echo "Records created successfully\n";
}
pg_close ( $con );
header ( 'Location: ../../web/login.php' );
exit ( 0 );
?>