<?php 

function display_title(){
	echo "My Profile";
}
function display_content() { 
require "dbconnect.php";

$id = $_GET['id'];

$sql = "SELECT * FROM users  
		JOIN accounts ON users.userId = accounts.userId
		WHERE accounts.userId = $id";

$result = mysqli_query($dbcon, $sql);
$dbarray = mysqli_fetch_assoc($result);
extract($dbarray);
	?>

	
<form class="container" <?php echo "action='updateprofile.php?id=$id'" ?> method="POST">
	<div class="columns is-multiline">
		<div class="column is-5">
			<p class="title">Personal Information</p>
			<div class="field ">
				<label class="label">Name:</label>
				<div class="control has-icons-left">
					<input class="input" type="name" placeholder="First Name" name="firstName" value="<?php echo $dbarray['firstName'] ?>"></input>
					<span class="icon is-left"><i class="fas fa-user"></i></span>
				</div>
				<p class="help">*min 4 characters</p>
			</div>
			<div class="field">
				<div class="control has-icons-left">
					<input class="input" type="name" placeholder="Last Name" name="lastName" id="regLastName" value="<?php echo $dbarray['lastName'] ?>"></input>
					<span class="icon is-left"><i class="fas fa-user"></i></span>
				</div>
			</div>
		</div>	

		<div class="column is-8">
			<div class="field">
				<label class="label">Address:</label>
				<div class="control has-icons-left">
					<input class="input" type="text" placeholder="Address" name="address" value="<?php echo $dbarray['address'] ?>"></input>
					<span class="icon is-left"><i class="fas fa-home"></i></span>
				</div>
				<p class="help">*min 4 characters</p>
			</div>	
			<div class="columns">
				<div class="column is-half">
					<div class="field">
						<label class="label">Email:</label>
						<div class="control has-icons-left is-expanded">
							<input class="input" type="email" placeholder="Email" name="email" value="<?php echo $dbarray['email'] ?>"></input>
							<span class="icon is-left"><i class="fas fa-envelope"></i></span>
						</div>
					</div>
				</div>
			</div>	
		</div>	<!-- personal info -->
		
		<div class="column is-5">
			<p class="title">Account Information</p>
			<div class="field">
				<label class="label">Change Password:</label>
				<div class="control has-icons-left">
					<input class="input" type="password" placeholder="Password" name="password"></input>
					<span class="icon is-left"><i class="fas fa-key"></i></span>
				</div>
				<p class="help">*min 4 characters</p>
			</div>
			<div class="field">
				<input class="button is-dark" type="submit" id="regSubBtn"></input>
			</div>
		</div>	<!-- acct info -->
		
	</div>
	</div>
</form>

<?php 	
}
require "partials/main.php";
?>

