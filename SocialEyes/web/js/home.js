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
	xhttp.open("POST", "../src/status/orderStatus.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "offset=" + offset;
	xhttp.send(para);
}

