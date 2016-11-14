function chat_expand_collapse(x) {
	
	if(x.className.includes("toggle")){
		x.className="row";
	}
	else
		x.className+=" toggle";
	
} 