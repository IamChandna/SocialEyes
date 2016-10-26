<?php
/*
 * @author ilaya
 * file to add navbar
 */
?>
<link rel="stylesheet" href="css/topNavBar.css" />
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php"> <img alt="logo"
				src="img/socialeyesLogoWhite.png" style="height: 20px; width: 30px;"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

			</ul>
			<div class="col-md-6" style="margin-top: .5em;">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search"> <span
						class="input-group-btn">
						<button class="btn btn-default" type="button">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</span>
				</div>
				<!-- /input-group -->
			</div>
			<!-- /.col-lg-6 -->

			<ul class="nav navbar-nav navbar-right">
				<li><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
				<li><a href="<?php echo "profile/".$_SESSION['uid']?>">Profile</a></li>
				<li><a href="../src/login/logout.php">Logout</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>