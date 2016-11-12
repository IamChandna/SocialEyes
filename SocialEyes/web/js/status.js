function like(uid, sid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (document.getElementById("like-" + sid).className == "glyphicon glyphicon-heart") {
				document.getElementById("like-" + sid).className = "glyphicon glyphicon-heart-empty";
			}
			else{
				document.getElementById("like-" + sid).className = "glyphicon glyphicon-heart";
			}
		}
	}
	if (document.getElementById("like-" + sid).className != "glyphicon glyphicon-heart") {
		xhttp.open("POST", "../src/status/likeStatus.php", true);
	} else {
		xhttp.open("POST", "../src/status/unlikeStatus.php", true);
	}
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "uid=" + uid + "&sid=" + sid;
	xhttp.send(para);
}
function commentLike(uid, cid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (document.getElementById("comment-like-" + cid).className == "glyphicon glyphicon-heart") {
				document.getElementById("comment-like-" + cid).className = "glyphicon glyphicon-heart-empty";
			}
			else{
				document.getElementById("comment-like-" + cid).className = "glyphicon glyphicon-heart";
			}
		}
	}
	if (document.getElementById("comment-like-" + cid).className != "glyphicon glyphicon-heart") {
		xhttp.open("POST", "../src/status/likeComment.php", true);
	} else {
		xhttp.open("POST", "../src/status/unlikeComment.php", true);
	}
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "uid=" + uid + "&cid=" + cid;
	xhttp.send(para);
}
function repost(uid, sid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("repost-" + sid).style.color = "#333";
		}
	}

	xhttp.open("POST", "../src/status/repostStatus.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "uid=" + uid + "&sid=" + sid;
	xhttp.send(para);
}
function comment(uid, sid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("comment-" + sid).innerHTML = this.response;
		}
	}

	xhttp.open("POST", "../src/status/commentOnStatus.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "uid=" + uid + "&sid=" + sid;
	xhttp.send(para);
}
function makeComment(uid, sid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			comment(uid,sid);
		}
	}

	xhttp.open("POST", "../src/status/makeComment.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "uid=" + uid + "&sid=" + sid+"&content="+document.getElementById("comment-list-text-box-"+sid).value;
	xhttp.send(para);
}