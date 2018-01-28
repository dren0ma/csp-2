<?php
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];

	}
	else {
		$username = 'Guest';
	}

?>

<nav class="navbar is-primary">
	<div class="navbar-brand">
		<a href="" class="navbar-item">
			Tuitt
		</a>
		<button class="button navbar-burger">
			<span></span>
			<span></span>
			<span></span>
		</button>
	</div>	<!-- navbar brand -->

<!-- temp username  -->
	<div class="navbar-menu">
		<div class="navbar-end">
			<div class="navbar-item">Hello <?php echo $username ?></div>
		</div>		
	</div>
<!--  -->

	<div class="navbar-menu">
		<div class="navbar-end">
			<a href="index.php" class="navbar-item">
				Home
			</a>
			<div class="navbar-item has-dropdown is-hoverable">
				<a href="shop.php" class="navbar-link">Shop</a>
				<div class="navbar-dropdown is-boxed">
					<a class="navbar-item">Menu</a>
					<a class="navbar-item">Menu</a>
					<a class="navbar-item">Menu</a>
					<a class="navbar-item">Menu</a>
				</div>
			</div>
			<a href="" class="navbar-item">
				About
			</a>
			<a href="" class="navbar-item">
				Contact Us
			</a>
			<?php
			if (isset($_SESSION['username'])) {
				echo "<a href='logout.php' class='navbar-item'>
					Logout
 				</a>";	
			}
			else {
				echo "<a id='showLogin' class='navbar-item'>
					Login/Register
				</a>";
			}


			?>
		</div>
	</div>	<!-- navbar menu -->
</nav>

<div class="modal" id="loginModal">
	<div class="modal-background">
		<button class="modal-close is-large login-modal-close"></button>
	</div>
	<div class="modal-card">
		<section class="modal-card-body">
			<form action="authenticate.php" method="POST">
				<div class="field">
					<label class="label">Login</label>
					<p class="control has-icons-left has-icons-right">
						<input class="input" type="text" name="username" placeholder="Username">
						<span class="icon is-left"><i class="fas fa-user"></i></span>
					</p>
				</div>
				<div class="field">
					<p class="control has-icons-left">
						<input class="input" type="password" name="password" placeholder="Password">
						<span class="icon is-left"><i class="fas fa-lock"></i></span>
					</p>
				</div>
				<div class="field is-grouped">
					<p class="control">
						<input class="button is-primary" type="submit" value="Login"></button>
					</p>
					<p class="control">
						<a href="register.php"><input type="button" class="button is-info" value="Register"></button></a>
					</p>
				</div>
			</form>
		</section>
	</div>
</div>	<!-- login/register modal form -->
