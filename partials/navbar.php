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
		<div class="navbar-end">
			<a class="navbar-item" href="disclaimer.php">
				About
			</a>
			<a class="navbar-item" href="shop.php">
				Shop
			</a>
			<a class="navbar-item" href="disclaimer.php">
				Contact Us
			</a>
			<div class="navbar-item">
				
			</div>
			<!-- acct username -->
			<?php 
			if ($firstName == 'Guest'){
				echo "<a class='navbar-item'>
					<span class='icon'>
						<i class='fas fa-user'></i>
					</span>
					$firstName 
				</a>";
			}
			else {
				echo "<a class='navbar-item' href='profile.php?id=$id'>
					<span class='icon'>
						<i class='fas fa-user'></i>
					</span>
					$firstName
				</a>";
			}

		//if acct is user/admin
		 
			if (isset($_SESSION['acctType']) && ($_SESSION['acctType'] == 1)) {
				echo "<a href='admin.php' class='navbar-item'>
					Dashboard
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