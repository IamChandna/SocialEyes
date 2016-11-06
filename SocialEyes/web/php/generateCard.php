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
<style>
.profile-pic img {
	width: 100%;
	border-radius: 50%;
}
.content{
	margin-top: 1em;
	margin-bottom: 1em;
}
.image-content img {
	width: 100%;
}
.buttons-area .glyphicon{
	color: #cc0d0d;
	font-size:20px;
	background-color: inherit;
	border: none;
}
.buttons-area .glyphicon:hover{
	color: #7b0000;
}
</style>
<div class="main-content">
	<div class="row">
		<div class="profile-pic col-md-2">
	 	<?php
			echo "<img src=\"../src/uploads/" . $o->getPropicForUid ( $row [8] ) . "\">";
		?>
		</div>
		<h3><?php echo $row[0];?></h3>
		<h5>Posted on <?php echo date( 'jS, D G:i',strtotime($row[7]));?></h5>
	</div>
	<div class="row">
		<div class="content col-md-10 col-md-offset-1">
			<p><?php echo $row[3];?></p>
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
			<label> <button class="glyphicon glyphicon-heart-empty" id="like-<?php echo $row[2];?>" onclick="like(<?php echo $_SESSION['user']['id'];?>,<?php echo $row[2];?>);"></button>Like  <?php echo $row[4];?></label>  
			<label> <button class="glyphicon glyphicon-comment"></button>Comment  </label> 
			<label> <button class="glyphicon glyphicon-retweet" onclick="repost(<?php echo $_SESSION['user']['id'];?>,<?php echo $row[2];?>);"></button>Repost  </label> 
			<?php print_r(in_array($_SESSION['user']['id'], json_decode($row[9])));?>
		</div>
	</div>
</div>
<script type="text/javascript">

</script>
<?php
}
?>