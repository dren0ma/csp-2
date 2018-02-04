<?php
require "dbconnect.php";
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];

	// find username firstName
	$sql = "SELECT * FROM users
		JOIN accounts ON users.userId = accounts.userId
		WHERE username = '$username'";
	$result = mysqli_query($dbcon, $sql);
	$dbarray = mysqli_fetch_assoc($result);
	$firstName = $dbarray['firstName'];
	$id = $dbarray['userId'];

}
else {
	$firstName = 'Guest';
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
		<div class="navbar-start">
			<a class="navbar-item" href="">
				About
			</a>
			<a class="navbar-item" href="shop.php">
				Shop
			</a>
			<a class="navbar-item" href="contact.php">
				Contact Us
			</a>
		</div>
		<div class="navbar-end">
			<!-- acct username -->
			<a class="navbar-item" <?php echo "href='profile.php?id=$id'>"?>
				Welcome <?php echo $firstName ?>
			</a>
		<!-- if acct is user/admin -->
		<?php 
			if (isset($_SESSION['acctType']) && ($_SESSION['acctType'] == 1)) {
				echo "<a href='admin.php' class='navbar-item'>
					Admin Page
 				</a>";	
			}
			else {
				echo "<a class='navbar-item' href='cart.php'>
					<span class='icon'>
						<i class='fas fa-shopping-cart'></i>
					</span>
					<span>Cart</span>
				</a>";
			}
		?>	
		<!-- login/logout -->
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