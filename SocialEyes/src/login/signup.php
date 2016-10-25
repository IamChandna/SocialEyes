<?php 
/*
 * @author ilaya
 * to register new users
 */
session_start();
if(isset($_SESSION['uid']))
{
	header('Location: ../../web/home.html');
	exit(0);
}
include_once 'credentials.php';
$con=pg_connect("host=".$dbHost." port=".$dbPort." dbname=".$dbName." user=".$dbUser." password=".$dbPass);
if(!$con){
	echo "Error : Unable to open database\n";
}
$query="insert into jaipal.users(uname,emailid,password) values('".$_POST['Username']."','".$_POST['Email']."','".md5($_POST['Password'].$salt)."');";
$ret=pg_query($con,$query); 
if(!$ret){
	echo pg_last_error($db);
} else {
	echo "Records created successfully\n";
}
pg_close($con);
header('Location: ../../web/login.html');
exit(0);
?>