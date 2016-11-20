function load10(offset) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("content-area").innerHTML = document
					.getElementById("content-area").innerHTML
					+ this.responseText;
		}
	}
	xhttp.open("POST", root+"../src/status/orderStatus.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "offset=" + offset;
	xhttp.send(para);
}
function loadLocal10(offset,uid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("content-area").innerHTML = document
					.getElementById("content-area").innerHTML
					+ this.responseText;
		}
	}
	xhttp.open("POST", root+"../src/status/orderLocalStatus.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "offset=" + offset+"&uid="+uid;
	xhttp.send(para);
}
function showUploaded(target,loc){
	document.getElementById(target).innerHTML=document.getElementById(loc).value;
}
// function monkeyPatchAutocomplete() {

//       // don't really need this, but in case I did, I could store it and chain
//       var oldFn = $.ui.autocomplete.prototype._renderItem;

//       $.ui.autocomplete.prototype._renderItem = function( ul, item) {
// 		  var user=item.label.split("&");
// 		  var t = "<a href='"+root+"profile/" + user[1] + "'>"+user[0]+"</a>"
//           return $( "<li></li>" )
//               .data( "item.autocomplete", item )
//               .append( "<a id='search-items'>" + t + "</a>" )
//               .appendTo( ul );
//       };
//   }
// $(document).ready(function(){
// 	monkeyPatchAutocomplete();
// })
function showNotifications(uid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("menu1").innerHTML = this.responseText;
		}
	}
	xhttp.open("POST", root+"../src/notifications/showNotifications.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "uid=" + uid;
	xhttp.send(para);
}
function toggleFollow(from,to,o)
{
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (o.className.includes("toggl")) {
				o.className="btn btn-primary";
				o.innerHTML="Follow <i class='fa fa-user-plus'></i>";
			}
			else{
				o.className+=(" toggl");
				o.innerHTML="Unfollow <i class='fa fa-user-times'></i>";
			}
		}
	}
	if (o.className.includes("toggl")) {
		xhttp.open("POST", root+"../src/settings/unFollow.php", true);
	} else {
		xhttp.open("POST", root+"../src/settings/follow.php", true);
	}
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "from=" + from + "&to=" + to;
	xhttp.send(para);
}