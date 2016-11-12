function chatLiveSearch(uid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
      //some more code
      var frame=document.getElementsByTagName("iframe")[0];
      var fdoc=(frame.contentWindow || frame.contentDocument);
      if (fdoc.document)fdoc = fdoc.document;
        fdoc.getElementById("items").innerHTML = this.responseText;
		}
	}
  var keyword=document.getElementById("chat-live-search-box").value;
	xhttp.open("POST", "../src/chat/chatSearch.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "uid=" + uid + "&keyword=" + keyword;
	xhttp.send(para);
}

