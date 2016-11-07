<?php
session_start ();
include '../postgres/query.php';
$o = new query ();
?>

<div class="actionBox">
	<ul class="commentList">
	<?php 
	$row=$o->getCommentidsFromStatus($_POST['sid']);
	$i=sizeof($row)-1;
	include 'displayComment.php';
	while ($i>=0){
		echo "<li>";
		displayComment($row[$i]);
		echo "</li>";
		$i=$i-1;
	}
	?>
	</ul>
	<form class="form-inline" role="form">
		<div class="form-group">
			<input class="form-control" type="text" placeholder="Your comments" />
		</div>
		<div class="form-group">
			<button class="btn btn-default">Add</button>
		</div>
	</form>
</div>