<?php
class query{
	
	var $con;
	
	public function  __construct(){
		$this->con=$this->databaseConn();
	}
	
	public function __destruct(){
		$this->con=$this->databaseConn();
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
	
	public function getUnameForUidFromUser($uid){
		$sql = "select uname from jaipal.users where uid='" . $uid . "';";
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
	
	public function getStatusForSid($sid){
		$sql = "select * from jaipal.status where statusid=".$sid.";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row;
		} else {
			die("status does not exist");
		}
	}
	
	public function getStatusLocalForUid($uid,$offset=0){
		$sql = "select uname,profilepicid,statusid,content,array_length(likes,1),comments,picid,time,u.uid,array_to_json(likes) from jaipal.status as s,jaipal.users as u,(select friendlist from jaipal.users where uid=".$uid.") as q where (s.uid=u.uid)and (s.uid=".$uid." or s.uid=any(q.friendlist))order by statusid desc limit ".(100+intval($offset)).";";
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
	
	public function getCommentFromComments($cid){
		$sql = "select content,array_to_json(likes),uname,u.uid,array_length(likes,1) from jaipal.comments as c,jaipal.users as u where c.uid=u.uid and commentid=".$cid.";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row;
		} else {
			die("comment does not exist");
		}
	}
	
	public function getCommentidsFromStatus($sid){
		$sql = "select array_to_json(comments) from jaipal.status where statusid=".$sid.";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return json_decode($row[0]);
		} else {
			die("comment does not exist");
		}
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
		if(isset($pid))
		$sql = "insert into jaipal.status (uid,content,picid,time) values (" . $uid . ",'" . $content . "'," . $pid . ",now());";
		else 
			$sql = "insert into jaipal.status (uid,content,time) values (" . $uid . ",'" . $content . "',now());";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Records created successfully\n";
		}
	}
	
	public function updateLikeInStatus($uid,$sid){
		$sql = "update jaipal.status set likes=array_append(likes,'".$uid."') where statusid=".$sid.";";
		
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Liked\n";
		}
	}
	
	public function updateNotLikeInStatus($uid,$sid){
		$sql = "update jaipal.status set likes=array_remove(likes,'".$uid."') where statusid=".$sid.";";
	
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "unliked\n";
		}
	}
	
	public function updateLikeInComment($uid,$cid){
		$sql = "update jaipal.comments set likes=array_append(likes,'".$uid."') where commentid=".$cid.";";
	
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Liked\n";
		}
	}
	
	public function updateNotLikeInComment($uid,$cid){
		$sql = "update jaipal.comments set likes=array_remove(likes,'".$uid."') where commentid=".$cid.";";
	
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "unliked\n";
		}
	}
	
}