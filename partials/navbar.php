<?php
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];

	}
	else {
		$username = 'Guest';
	}

?>
<figure class="image logo">
	<img src="assets/img/logo.png" alt="Logo">	
</figure>
<section class="hero is-primary hero-nav">
	<!-- head -->
	<div class="hero-head">
		<nav class="navbar">
			<div class="navbar-end">
				<a class="navbar-item">Welcome <?php echo $username ?></a>
				<a class="navbar-item" href="cart.php">
				<span class="icon">
					<i class="fas fa-shopping-cart"></i>
				</span>
				<span>View Cart ()</span>
				</a>
			</div>
		</nav>
	</div>	
	<!-- /head -->
	
	<!-- body -->
	<div class="hero-body has-text-centered is-paddingless nav-mid">
		<div class="tile is-ancestor">
			<div class="tile is-9 is-parent">
				
			</div>
			<div class="tile">
				<div class="tile is-parent">
					<figure class="image is-64x64 is-child nav-icons">
						<img src="assets/img/icons/facebook.png">
					</figure>
					<figure class="image is-64x64 is-child nav-icons">
						<img src="assets/img/icons/instagram.png">
					</figure>
					<figure class="image is-64x64 is-child nav-icons">
						<img src="assets/img/icons/twitter.png">
					</figure>
					<figure class="image is-64x64 is-child nav-icons">
						<img src="assets/img/icons/pinterest.png">
					</figure>
				</div>
			</div>	
		</div>
	</div>	
	<!-- /body -->

	<!-- foot -->
	<div class="hero-foot">
		<nav class="navbar">
			<div class="navbar-brand">
				<span class="navbar-burger burger" data-target="navbarMenu">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</div>
			<div class="navbar-menu hero-nav-btm" id="navbarMenu">
				<div class="navbar-end">
					<a href="index.php" class="navbar-item">
						Home
					</a>
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="shop.php" class="navbar-item">Shop</a>
						<div class="navbar-dropdown">
							<a class="navbar-item">Menu</a>
							<a class="navbar-item">Menu</a>
							<a class="navbar-item">Menu</a>
							<a class="navbar-item">Menu</a>
						</div>
					</div>
					<a href="" class="navbar-item">
						About
					</a>
					<a href="contact.php" class="navbar-item">
						Contact Us
					</a>
					<!-- show current user -->
					<?php
					if (isset($_SESSION['username'])) {
						echo "<a href='logout.php' class='navbar-item'>
							Logout
		 				</a>";	
					}
					else {
						echo "<a href='login.php' id='showLogin' class='navbar-item'>
							Login/Register
						</a>";
					}
					?>
				</div>
			</div>
		</nav>
	</div>	
	<!-- foot -->
</section>
