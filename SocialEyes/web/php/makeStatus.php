<link href="css/makeStatus.css" rel="stylesheet">
<form class = "form-horizontal" role = "form" action="../src/status/createStatus.php" method="post" id="textstatus">
   
   <div class = "form-group" id="statusTextArea" >
      <textarea class = "form-control" rows = "3" placeholder="Post a status!" required=""></textarea>
   </div>
   <a href="#" class="btn btn-primary btn-sm" role="button" id="buttonStyle" >
   <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
   </a>
   <label for="inputfile" class="btn btn-primary btn-sm" role="button" id="buttonStyle">
	<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
   </label>
   <input type = "file" id = "inputfile" style="display: none;">
   <div class="pull-right">
   <button type = "submit" class = "btn btn-primary" id="buttonStyle">Post</button>
   </div>
</form>
