<?php
/*
 * @author ilaya
 * each $row is
 * Array (
 * [0] => uname /
 * [1] => profilepic /
 * [2] => statusid 
 * [3] => content /
 * [4] => likes
 * [5] => comments
 * [6] => picid /
 * [7] => time 
 * [8] => s.uid
 * )
 */
function generateCard($row) {
	$o = new query ();
	?>
<style>
.profile-pic img {
	width: 100%;
}
.content{
	margin-top: 1em;
	margin-bottom: 1em;
}
.image-content img {
	width: 100%;
	margin-bottom: 1em;
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
</div>
<?php
}
?>