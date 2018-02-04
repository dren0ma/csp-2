<?php 
require "dbconnect.php";
function display_title(){
	echo "Account Registration";
}
function display_content() { ?>

<div class="section">
<form class="container" action="reguser.php" method="POST">
	<div class="columns is-multiline">
		<div class="column is-5">
			<p class="title">Personal Information</p>
			<div class="field ">
				<label class="label">Name:</label>
				<div class="control has-icons-left">
					<input class="input is-danger" type="name" placeholder="First Name" name="firstName" id="regFirstName"></input>
					<span class="icon is-left"><i class="fas fa-user"></i></span>
				</div>
				<p class="help">*min 4 characters</p>
			</div>
			<div class="field">
				<div class="control has-icons-left">
					<input class="input" type="name" placeholder="Last Name" name="lastName" id="regLastName"></input>
					<span class="icon is-left"><i class="fas fa-user"></i></span>
				</div>
			</div>
		</div>	

		<div class="column is-8">
			<div class="field">
				<label class="label">Address:</label>
				<div class="control has-icons-left">
					<input class="input is-danger" type="text" placeholder="Address" name="address" id="regAddress"></input>
					<span class="icon is-left"><i class="fas fa-home"></i></span>
				</div>
				<p class="help">*min 4 characters</p>
			</div>	
			<div class="columns">
				<div class="column is-half">
					<div class="field">
						<label class="label">Email:</label>
						<div class="control has-icons-left is-expanded">
							<input class="input is-danger" type="email" placeholder="Email" name="email" id="regEmail"></input>
							<span class="icon is-left"><i class="fas fa-envelope"></i></span>
						</div>
					</div>
				</div>
			</div>	
		</div>	<!-- personal info -->
		
		<div class="column is-5">
			<p class="title">Account Information</p>
			<div class="field">
				<label class="label">Username:</label>
				<div class="control has-icons-left">
					<input class="input is-danger" type="text" placeholder="Username" name="userName" id="regUserName"></input>
					<span class="icon is-left"><i class="fas fa-lock"></i></span>
				</div>
				<p class="help">*min 4 characters</p>
			</div>
			<div class="field">
				<label class="label">Password:</label>
				<div class="control has-icons-left">
					<input class="input is-danger" type="password" placeholder="Password" name="password" id="regPassword"></input>
					<span class="icon is-left"><i class="fas fa-key"></i></span>
				</div>
				<p class="help">*min 4 characters</p>
			</div>
			<div class="field">
				<label class="label">Confirm Password:</label>
				<div class="control has-icons-left" id="conPassswordDiv">
					<input class="input is-danger" type="password" placeholder="Password" name="conpassword" id="regConpassword"></input>
					<span class="icon is-left"><i class="fas fa-key"></i></span>
				</div>
				
			</div>
			<div class="field">
				<input class="button is-info" type="submit" id="regSubBtn"></input>
			</div>
		</div>	<!-- acct info -->
		
	</div>
	</div>
</form>
</div>

<?php 	
}
require "partials/main.php";
?>

