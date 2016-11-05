<?php
class query{
	
	var $con;
	
	public function  __construct(){
		$this->con=$this->databaseConn();
	}
	
	public function __destruct(){
		pg_close($this->con);
	}
	
	public function databaseConn(){
		include 'credentials.php';
		//$con = pg_connect ( "host=" . $dbHost . " port=" . $dbPort . " dbname=" . $dbName . " user=" . $dbUser . " password=" . $dbPass );
		//if (! $con) {
		$con = pg_connect ( "host=" . $dbHostAlt . " port=" . $dbPort . " dbname=" . $dbName . " user=" . $dbUserAlt . " password=" . $dbPassAlt );
		if(! $con) {
			die("failed to connect to databases");
		}
		//}
		return $con;
	}
	
	public function getAllForEmailFromUser($email){
		$sql = "select password,uid,uname from jaipal.users where emailid='" . $email . "';";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row;
		} else {
			die("either username or password incorrect");
		}
	}
	
	public function getPropicForUid($uid){
		$sql = "select link from jaipal.gallery where picid=(select profilepicid from jaipal.users where uid=".$uid.");";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row[0];
		} else {
			die("pic does not exist");
		}
	}
	
	public function getCoverpicForUid($uid){
		$sql = "select link from jaipal.gallery where picid=(select coverpicid from jaipal.users where uid=".$uid.");";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row[0];
		} else {
			die("pic does not exist");
		}
	}
	
	public function getPiclinkForPidFromGallery($pid){
		$sql = "select link from jaipal.gallery where picid=".$pid.";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row[0];
		} else {
			die("pic does not exist");
		}
	}
	
	public function getStatusLocalForUid($uid,$offset=0){
		$sql = "select uname,profilepicid,statusid,content,likes,comments,picid,time,u.uid from jaipal.status as s,jaipal.users as u where (s.uid=u.uid)and (s.uid=".$uid." or s.uid=any(friendlist)) order by statusid desc limit ".(100+intval($offset)).";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		$status=array();
		$i=0;
		while ($row = pg_fetch_row ( $ret )) {
			if($i>=$offset)
				$status[]=$row;
		} 
		return $status;
	}
	
	public function putBasicToUser($uname,$email,$pass){
		$sql = "insert into jaipal.users(uname,emailid,password) values('" . $uname . "','" . $email . "','" . $pass . "');";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Records created successfully\n";
		}
	}
	
	public function putImageToGallery($pid,$uid,$file){
		$sql="insert into jaipal.gallery values (".$pid.",".$uid.",'".$file."');";
		//echo $sql;
		//print_r( $_SESSION);
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Records created successfully\n";
		}
	}
	
	public function putStatusToStatus($uid,$content,$pid){
		$sql = "insert into jaipal.status (uid,content,picid,time) values (" . $uid . ",'" . $content . "'," . $pid . ",now());";
		
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Records created successfully\n";
		}
	}
	
}