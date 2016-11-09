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
	<div class="input-group">
      <input type="text" class="form-control" placeholder="comment here..."
      id="comment-list-text-box-<?php echo $_POST['sid'];?>">
      <span class="input-group-btn">
        <button class="btn btn-default glyphicon glyphicon-comment"  style="background-color: inherit;" type="button"></button>
      </span>
    </div>
</div>