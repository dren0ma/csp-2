<?php
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];

	}
	else {
		$username = 'Guest';
	}

?>

<nav class="navbar is-dark is-fixed-top">
	<div class="navbar-brand">
		<a class="navbar-item" href="index.php">
			<img src="assets/img/logo2.png">			
		</a>
		<span class="navbar-burger burger" data-target="navbarMenu">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</div>
	<div class="navbar-menu" id="navbarMenu">
		<div class="navbar-end">
			<a class="navbar-item" href="shop.php">
				Shop
			</a>
		</div>
	</div>
	
</nav>