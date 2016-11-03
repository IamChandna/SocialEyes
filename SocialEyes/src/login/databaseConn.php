-<?php
function databaseConn(){
	include 'credentials.php';
	$con = pg_connect ( "host=" . $dbHost . " port=" . $dbPort . " dbname=" . $dbName . " user=" . $dbUser . " password=" . $dbPass );
	if (! $con) {
		$con = pg_connect ( "host=" . $dbHostAlt . " port=" . $dbPort . " dbname=" . $dbName . " user=" . $dbUserAlt . " password=" . $dbPassAlt );
		if(! $con) {
			die("failed to connect to databases");
		}
	}
	return $con;
}