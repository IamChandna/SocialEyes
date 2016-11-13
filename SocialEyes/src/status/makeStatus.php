<link href="css/makeStatus.css" rel="stylesheet">
<form class="form-horizontal" role="form"
	action="../src/status/createStatus.php" enctype="multipart/form-data"
	method="post" id="textstatus">

	<div class="form-group" id="statusTextArea">
		<textarea name="statusText" class="form-control" rows="3"
			placeholder="What did you do today?" required></textarea>
	</div>
	<label for="inputfile" class="btn btn-primary btn-sm" role="button"
		id="buttonStyle"> <span class="glyphicon glyphicon-picture"
		aria-hidden="true"></span>
	</label> <input name="image" type="file" id="inputfile"
		style="display: none;" onchange="showUploaded();">
		<label id="upload-description"></label>
	<div class="pull-right">
		<button type="submit" class="btn btn-primary" id="buttonStyle">Post</button>
	</div>
</form>
