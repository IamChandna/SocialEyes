<?php
/*
 * @author ilaya
 * each $row is
 * Array (
 * [0] => uname /
 * [1] => profilepic /
 * [2] => statusid 
 * [3] => content /
 * [4] => no of likes /
 * [5] => comments
 * [6] => picid /
 * [7] => time 
 * [8] => s.uid
 * [9] => likes /
 * )
 */
function generateCard($row) {
	$o = new query ();
	?>

<div class="main-content">
	<div class="row">
		<div class="profile-pic col-md-2">
	 	<?php
			echo "<img src=\"../src/uploads/" . $o->getPropicForUid ( $row [8] ) . "\">";
		?>
		</div>
		<div class="col-md-9">
			<div class="row">
				<h3><a class="" href="profile/<?php echo $row[8];?>"><?php echo $row[0];?></a></h3>
			</div>
			<div class="row">
				<h5 style="margin-top: 0px;">Posted on <?php echo date( 'jS, D G:i',strtotime($row[7]));?></h5>
			</div>
		</div>
		
		
	</div>
	<div class="row">
		<div class="content col-md-10 col-md-offset-1">
			<p style="word-wrap: break-word;"><?php echo $row[3];?></p>
		</div>
	</div>
	<div class="row">
		<div class="image-content col-md-10 col-md-offset-1">
			<?php 
			if(isset($row[6]))
			echo "<img src=\"../src/uploads/" . $o->getPiclinkForPidFromGallery( $row [6] ) . "\">";
			?>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="buttons-area col-md-10 col-md-offset-1">
			<label> <button class="glyphicon glyphicon-heart<?php if(in_array($_SESSION['user']['id'], json_decode($row[9]))==null)
				echo "-empty";
				?>"
				 id="like-<?php echo $row[2];?>" onclick="like(<?php echo $_SESSION['user']['id'];?>,<?php echo $row[2];?>);"></button>Like  <?php echo $row[4];?></label>  
			<label> <button class="glyphicon glyphicon-comment" 
			onclick="comment(<?php echo $_SESSION['user']['id'];?>,<?php echo $row[2];?>);"
			></button>Comment  </label> 
			<label> <button class="glyphicon glyphicon-retweet"
			id="repost-<?php echo $row[2];?>"
			 onclick="repost(<?php echo $_SESSION['user']['id'];?>,<?php echo $row[2];?>);"></button>Repost  </label>
		</div>
	</div>
	<div class="row">
		<div id="comment-<?php echo $row[2];?>" class="col-md-10 col-md-offset-1"></div>
	</div>
	
</div>
<script type="text/javascript">

</script>
<?php
}
?>