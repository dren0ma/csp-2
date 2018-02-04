<?php 
require "dbconnect.php";
function display_title(){
	echo "Account Login";
}
function display_content() { ?>

<div class="container">
	<div class="columns is-vcentered" id="form-login-col">
		<div class="column is-6 is-offset-3">
			<form action="authenticate.php" method="POST" id="form-login">
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
						<input class="button is-info" type="submit" value="Login"></button>
					</p>
					<p class="control">
						<a href="register.php"><input type="button" class="button is-dark" value="Register"></button></a>
					</p>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	
}
require "partials/main.php";
?>

