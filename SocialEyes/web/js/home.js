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

function showUploaded(){
	document.getElementById("upload-description").innerHTML=document.getElementById("inputfile").value;
}
function monkeyPatchAutocomplete() {

      // don't really need this, but in case I did, I could store it and chain
      var oldFn = $.ui.autocomplete.prototype._renderItem;

      $.ui.autocomplete.prototype._renderItem = function( ul, item) {
          /*var re = new RegExp("^" + this.term) ;
          var t = item.label.replace(re,"<span style='font-weight:bold;color:Blue;'>" + 
                  this.term + 
                  "</span>");*/
          return $( "<li></li>" )
              .data( "item.autocomplete", item )
              .append( "<a>" + t + "</a>" )
              .appendTo( ul );
      };
  }
$(document).ready(function(){
	monkeyPatchAutocomplete();
})