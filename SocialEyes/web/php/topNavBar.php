<?php
/*
 * @author ilaya
 * file to add navbar
 */
?>
<link rel="stylesheet" href="<?php echo $root;?>css/topNavBar.css" />
<nav class="navbar navbar-inverse navbar-fixed-top">
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
			<a class="navbar-brand" href="<?php echo $root;?>home.php"> <img
				alt="logo" src="<?php echo $root;?>img/socialeyesLogoWhite.png"
				style="height: 20px; width: 30px;"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

			</ul>
			<div class="col-md-6" style="margin-top: .5em;">
			<form action="<?php echo $root;?>search.php" method="get">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search"
						id="live-search-box" name="key"> <span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</span>
				</div>
				</form>
				<!-- /input-group -->
			</div>
			<!-- /.col-lg-6 -->

			<ul class="nav navbar-nav navbar-right">

				<li><a href="<?php echo $root;?>home.php">Home <span class="sr-only">(current)</span></a></li>

				<li
					style="border-left: 1px solid #a00; border-right: 1px solid #a00;"
					class="dropdown"><a href="#" class="dropdown-toggle" id="drop4"
					data-toggle="dropdown" role="button" aria-haspopup="true"
					aria-expanded="false" onclick="showNotifications(<?php echo $_SESSION['user']['id'];?>);"> <span class="glyphicon glyphicon-bell"></span>
						<span class="badge" id="notification-bell"><?php echo $o->getNotificationCount($_SESSION['user']['id']);?></span>
				</a>
					<ul class="dropdown-menu" id="menu1" aria-labelledby="drop4" style="left: 0; right: auto;">
						
					</ul>
				</li>

				<li style="border-right: 1px solid #a00;"><a
					href="<?php echo $root;?>settings.php"><span
						class="glyphicon glyphicon-cog"></span></a></li>

				<li><a href="<?php echo $root."profile/".$_SESSION['user']['id']?>">Profile</a></li>

				<li><a href="<?php echo $root;?>../src/login/logout.php">Logout</a></li>

			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>