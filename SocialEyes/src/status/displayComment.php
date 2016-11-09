<?php

function displayComment($cid){
	$o=new query();
	$r=$o->getCommentFromComments($cid);
	/*
	 * $r{
	 * [0] => content
	 * [1] => likesjson
	 * [2] => uname
	 * [3] => uid
	 * [4] => noOfLikes
	 * }
	 */
?>
<div class="commenterImage">
	<img src="../src/status/<?php echo $o->getPropicForUid($r[3]);?>" /> 
</div>
<a class="" style="color:#000; text-decoration: none; font-weight: bold;"
		href="profile/<?php echo $r[2];?>">
				<?php echo $r[2];?>
				</a>
<div class="commentText">
	<p class=""><?php echo $r[0];?></p>
	<label style="color:#911;">
		<button
			class="glyphicon glyphicon-heart<?php if(in_array($_SESSION['user']['id'], json_decode($r[1]))==null)
				echo "-empty";
				?>"
			id="comment-like-<?php echo $cid;?>"
			style="background-color: inherit;border: none;"
			onclick="commentLike(<?php echo $_SESSION['user']['id'];?>,<?php echo $cid;?>);">
		</button>
		Like  <?php echo $r[4];?>
	</label>
</div>
<?php 
}
?>