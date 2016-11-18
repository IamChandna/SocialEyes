<?php {
class query {
	var $con;
	public function __construct() {
		$this->con = $this->databaseConn ();
	}
	public function __destruct() {
		$this->con = $this->databaseConn ();
		pg_close ( $this->con );
	}
	public function databaseConn() {
		include 'credentials.php';
		$con = pg_connect ( "host=" . $dbHost . " port=" . $dbPort . " dbname=" . $dbName . " user=" . $dbUser . " password=" . $dbPass );
		if (! $con) {
			$con = pg_connect ( "host=" . $dbHostAlt . " port=" . $dbPort . " dbname=" . $dbName . " user=" . $dbUserAlt . " password=" . $dbPassAlt );
			if (! $con) {
				die ( "failed to connect to databases" );
			}
		}
		return $con;
	}
	public function getAllForEmailFromUser($email) {
		$sql = "select password,uid,uname from jaipal.users where emailid='" . $email . "';";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row;
		} else {
			die ( "either username or password incorrect" );
		}
	}
	public function getFriendsForUid($uid) {
		$sql = "select array_to_json(friendlist) from jaipal.users where uid='" . $uid . "' ;";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return json_decode ( $row );
		} else {
			return ("somethings wrong with us not ur friends");
		}
	}
	public function getFriendsForUidKeyword($uid, $keyword) {
		$sql = "select uname,uid,profilepicid from (select unnest(friendlist) as fid from jaipal.users where uid='" . $uid . "') as f join jaipal.users as u on fid=uid where uname ~* '(^| )" . $keyword . "' limit 4;";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		$friends = array ();
		while ( $row = pg_fetch_row ( $ret ) ) {
			$friends [] = $row;
		}
		return $friends;
	}
	public function getEncodedUsersForKeyword($keyword) {
		$sql = "select uname,uid,profilepicid from jaipal.users where uname ~* '(^| )" . $keyword . "' limit 4;";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		$friends = array ();
		while ( $row = pg_fetch_row ( $ret ) ) {
			$friends [] = $row [0] . "&" . $row [1] . "&" . $row [2];
		}
		return $friends;
	}
	public function getUnameForUidFromUser($uid) {
		$sql = "select uname from jaipal.users where uid='" . $uid . "';";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row;
		} else {
			die ( "either username or password incorrect" );
		}
	}
	public function getPropicForUid($uid) {
		$sql = "select link from jaipal.gallery where picid=(select profilepicid from jaipal.users where uid=" . $uid . ");";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row [0];
		} else {
			die ( "pic does not exist" );
		}
	}
	public function getCoverpicForUid($uid) {
		$sql = "select link from jaipal.gallery where picid=(select coverpicid from jaipal.users where uid=" . $uid . ");";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row [0];
		} else {
			die ( "pic does not exist" );
		}
	}
	public function getPiclinkForPidFromGallery($pid) {
		$sql = "select link from jaipal.gallery where picid=" . $pid . ";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row [0];
		} else {
			die ( "pic does not exist" );
		}
	}
	public function getStatusForSid($sid) {
		$sql = "select * from jaipal.status where statusid=" . $sid . ";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row;
		} else {
			die ( "status does not exist" );
		}
	}
	public function getPicForSid($sid) {
		$sql = "select picid from jaipal.status where statusid=" . $sid . ";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row [0];
		} else {
			die ( "status does not exist" );
		}
	}
	public function getUidForSid($sid) {
		$sql = "select uid from jaipal.status where statusid=" . $sid . ";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row [0];
		} else {
			die ( "status does not exist" );
		}
	}
	public function getStatusLocalForUid($uid, $offset) {
		$sql = "select uname,profilepicid,statusid,content,array_length(likes,1),comments,picid,time,u.uid,array_to_json(likes) from jaipal.status as s,jaipal.users as u,(select friendlist from jaipal.users where uid=" . $uid . ") as q where (s.uid=u.uid)and (s.uid=" . $uid . " or s.uid=any(q.friendlist))order by statusid desc limit " . (10 + intval ( $offset )) . ";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		$status = array ();
		$i = 0;
		while ( $row = pg_fetch_row ( $ret ) ) {
			if ($i >= $offset)
				$status [] = $row;
			$i += 1;
		}
		return $status;
	}
	public function getStatusOfUid($uid, $offset) {
		$sql = "select uname,profilepicid,statusid,content,array_length(likes,1),comments,picid,time,u.uid,array_to_json(likes) from jaipal.status as s,jaipal.users as u where (s.uid=u.uid)and (s.uid=" . $uid . ") order by statusid desc limit " . (10 + intval ( $offset )) . ";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		$status = array ();
		$i = 0;
		while ( $row = pg_fetch_row ( $ret ) ) {
			if ($i >= $offset)
				$status [] = $row;
			$i += 1;
		}
		return $status;
	}
	public function getCommentFromComments($cid) {
		$sql = "select content,array_to_json(likes),uname,u.uid,array_length(likes,1) from jaipal.comments as c,jaipal.users as u where c.uid=u.uid and commentid=" . $cid . ";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row;
		} else {
			die ( "comment does not exist" );
		}
	}
	public function getCommentidsFromStatus($sid) {
		$sql = "select array_to_json(comments) from jaipal.status where statusid=" . $sid . ";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return json_decode ( $row [0] );
		} else {
			die ( "comment does not exist" );
		}
	}
	public function getNotificationCount($uid) {
		$sql = "select count(message) from jaipal.notifications where uid=" . $uid . " and seen=false;";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		if ($row = pg_fetch_row ( $ret )) {
			return $row [0];
		} else {
			return 0;
		}
	}
	public function getNotifications($uid) {
		$sql = "select message from jaipal.notifications where uid=" . $uid . " and seen=false;";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		$notif = array ();
		$i = 0;
		while ( $row = pg_fetch_row ( $ret ) ) {
			$notif [] = $row [0];
		}
		return $notif;
	}
	public function getConvidForChat($u1, $u2) {
		if($u1>$u2)
		{
			$t=$u2;
			$u2=$u1;
			$u1=$t;
		}
		$sql="select convid from jaipal.conversation where u1='" . $u1 . "' AND u2='" . $u2 . "';";
		if ($row = pg_fetch_row ( $ret )) {
			return $row[0];
		}
		else{
			$sql = "insert into jaipal.conversation (u1,u2) values('" . $u1 . "','" . $u2 . "') returning convid;";
			$ret = pg_query ( $this->con, $sql );
			if (! $ret) {
				echo pg_last_error ( $this->con );
				exit ();
			}
			if ($row = pg_fetch_row ( $ret )) {
				return $row[0];
			}
		}
	}
	public function getAllConvidMsgidForUid($uid) {
		$sql = "select a.convid, mid, u1, u2 from (select convid , max(msgid) as mid from jaipal.chat where convid in (select convid from jaipal.conversation where u1 = ".$uid." OR u2 = ".$uid.")group by convid)as a join jaipal.conversation as c on a.convid = c.convid order by a.mid DESC;";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} 
		$conv = array ();
		$i = 0;
		while ( $row = pg_fetch_row ( $ret ) ) {
			$conv [] = $row ;
		}
		return $conv;
	}
	public function putBasicToUser($uname, $email, $pass) {
	$sql = "insert into jaipal.users(uname,emailid,password) values('" . $uname . "','" . $email . "','" . $pass . "');";
	$ret = pg_query ( $this->con, $sql );
	if (! $ret) {
		echo pg_last_error ( $this->con );
	} else {
		echo "Records created successfully\n";
	}
}
	public function putImageToGallery($pid, $uid, $file) {
		$sql = "insert into jaipal.gallery values (" . $pid . "," . $uid . ",'" . $file . "');";
		// echo $sql;
		// print_r( $_SESSION);
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Records created successfully\n";
		}
	}
	public function putStatusToStatus($uid, $content, $pid) {
		if (isset ( $pid ))
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
	public function putCommentToStatus($uid, $content, $sid) {
		$sql = "insert into jaipal.comments (uid,content) values (" . $uid . ",'" . $content . "') returning commentid";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			$cid = pg_fetch_row ( $ret );
			$sql = "update jaipal.status set comments= array_append(comments,'" . $cid [0] . "') where statusid=" . $sid . ";";
			$ret = pg_query ( $this->con, $sql );
			if (! $ret) {
				echo pg_last_error ( $this->con );
			} else {
				echo "Records created successfully\n";
			}
		}
	}
	public function putNotification($uid, $content) {
		$sql = "insert into jaipal.notifications (uid,message) values (" . $uid . ",'" . $content . "')";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Records created successfully\n";
		}
	}
	public function putMessage($uid, $content) {
		$sql = "insert into jaipal.chat (uid,msg) values (" . $uid . ",'" . $content . "')";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Chat sent!\n";
		}
	}
	public function updateLikeInStatus($uid, $sid) {
		$sql = "update jaipal.status set likes=array_append(likes,'" . $uid . "') where statusid=" . $sid . ";";

		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Liked\n";
		}
	}
	public function updateNotLikeInStatus($uid, $sid) {
		$sql = "update jaipal.status set likes=array_remove(likes,'" . $uid . "') where statusid=" . $sid . ";";

		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "unliked\n";
		}
	}
	public function updateLikeInComment($uid, $cid) {
		$sql = "update jaipal.comments set likes=array_append(likes,'" . $uid . "') where commentid=" . $cid . ";";

		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "Liked\n";
		}
	}
	public function updateNotLikeInComment($uid, $cid) {
		$sql = "update jaipal.comments set likes=array_remove(likes,'" . $uid . "') where commentid=" . $cid . ";";

		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "unliked\n";
		}
	}
	public function updatePropic($uid, $pid) {
		$sql = "update jaipal.users set propicid=".$pid." where uid=".$uid.";";
	
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "updated propic\n";
		}
	}
	public function updateCoverpic($uid, $pid) {
		$sql = "update jaipal.users set coverid=".$pid." where uid=".$uid.";";
	
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "updated cover pic\n";
		}
	}
	public function updateUsername($uid, $uname) {
		$sql = "update jaipal.users set uname=".$uname." where uid=".$uid.";";
	
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "updated username\n";
		}
	}
	public function updatePassword($uid, $pass) {
		$sql = "update jaipal.users set password=".$pass." where uid=".$uid.";";
	
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "updated password\n";
		}
	}
	public function updateEmailid($uid, $email) {
		$sql = "update jaipal.users set emailid=".$pass." where uid=".$uid.";";
	
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "updated emailid\n";
		}
	}
	public function updateDOB($uid, $dob) {
		$sql = "update jaipal.users set emailid=".$pass." where uid=".$uid.";";
	
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "updated emailid\n";
		}
	}
	public function udateSeenInNotifications($uid) {
		$sql = "update jaipal.notifications set seen=true where uid=" . $uid . ";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
			exit ();
		}
		$notif = array ();
		$i = 0;
		while ( $row = pg_fetch_row ( $ret ) ) {
			$notif [] = $row [0];
		}
		return $notif;
	}
	public function deleteStatus($sid) {
		$sql = "delete from jaipal.status where statusid=".$sid.";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "status deleted\n";
		}
	}
	public function deletePicFromGallery($pid) {
		$sql = "delete from jaipal.gallery where picid=".$pid.";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			echo "pic deleted\n";
		}
	}
	public function deleteComment($cid) {
		$sql = "delete from jaipal.comments where commentid=".$cid.";";
		$ret = pg_query ( $this->con, $sql );
		if (! $ret) {
			echo pg_last_error ( $this->con );
		} else {
			$sql = "update jaipal.status set comments=array_remove(comments,'".$cid."');";
			$ret = pg_query ( $this->con, $sql );
			if (! $ret) {
				echo pg_last_error ( $this->con );
			} else {
					echo "comment deleted";
			}
		}
	}
}
}