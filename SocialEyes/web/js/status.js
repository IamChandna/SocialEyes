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
		xhttp.open("POST", root+"../src/status/likeStatus.php", true);
	} else {
		xhttp.open("POST", root+"../src/status/unlikeStatus.php", true);
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
		xhttp.open("POST", root+"../src/status/likeComment.php", true);
	} else {
		xhttp.open("POST", root+"../src/status/unlikeComment.php", true);
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

	xhttp.open("POST", root+"../src/status/repostStatus.php", true);
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

	xhttp.open("POST", root+"../src/status/commentOnStatus.php", true);
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

	xhttp.open("POST", root+"../src/status/makeComment.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "uid=" + uid + "&sid=" + sid+"&content="+document.getElementById("comment-list-text-box-"+sid).value;
	xhttp.send(para);
}
function deleteStatus(o,sid,uid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText!="1"){
				o.style.opacity=0;
				setTimeout(function(){
					o.style.display="none";
				}, 2000);
			}
			else{
				o.style.background="#ffc2c2";
			}
		}
	}

	xhttp.open("POST", root+"../src/status/deleteStatus.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "sid=" + sid+"&uid="+uid;
	xhttp.send(para);
}
function deleteComment(o,cid,uid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText!="1"){
				o.style.opacity=0;
				setTimeout(function(){
					o.style.display="none";
				}, 2000);
			}
			else{
				o.style.background="#ffc2c2";
			}
		}
	}

	xhttp.open("POST", root+"../src/status/deleteComment.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "cid=" + cid + "&uid="+uid;
	xhttp.send(para);
}
/*
function periodElapsed(timeInMilli) {
		// function to compare date to present and print period elapsed 
        d=new Date(timeInMulli);
		now=new Date();
		difference=now.getTimeInMillis()-d.getTimeInMillis();
        var result="";
		if(difference<1)
		{
			result="error";
		}
		var divSet=[1000,60,60,24,7,4,12,1];
		var timeSet=["millisecond","second","minute","hour","day","week","month","year"];
		var info=0,at=0;
		for(var i=0;i<divSet.length;i++)
		{
			if(difference%divSet[i]!=0)
			{
				info=(int) (difference%divSet[i]);
				at=i;
			}
			difference/=divSet[i];
		}
		if(info!=1)
		{
			result=(info+" "+timeSet[at]+"s ago");
		}
		else
		{
			switch(at)
			{
			case 0:
			case 1:
			case 2:
			case 3:
				result=("a "+timeSet[at]+" ago");
				break;
			case 4:
				result=("yesterday");
				break;
			case 5:
			case 6:
			case 7:
				result=("last "+timeSet[at]);
				break;
			}
        }
        return result;
	}*/