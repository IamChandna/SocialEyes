function chat_expand_collapse(x,convid) {
	
	if(x.className.includes("toggle")){
		x.className="row messaging";
	}
	else{
		x.className+=" toggle";
		document.getElementById("conversation-badge-"+convid).innerHTML="";
		//code here for fn
	}
} 
function generateChatHistory() {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("chats").innerHTML = this.responseText;
			$(".message-box").emojioneArea();
		}
	}
	xhttp.open("POST", root+"../src/chat/populateChatBlock.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "";
	xhttp.send(para);
}
function sendMessage(msgobj,convid) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("previouschats"+convid).innerHTML += this.responseText
			$(".one").emojioneArea();
			$(".one").removeClass("one");
		}
	}
	
	var msg=msgobj.value;
	msgobj.value="";
	xhttp.open("POST", root+"../src/chat/sendMessage.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var para = "msg="+msg+"&convid="+convid;
	xhttp.send(para);
}