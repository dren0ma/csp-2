<?php 
function display_title(){
	echo "Dashboard";
}
function display_content() { 
require 'dbconnect.php';

$username = $_SESSION['username'];
if (isset($_SESSION['acctType']) && ($_SESSION['acctType'] == 1)) {


?>
<div class="section dash-section">
	<div class="level subtitle is-1">
		<h2>Dashboard</h2>
	</div>
</div>
<div class="section">
	<div class="tile is-ancestor">
		<div class="tile is-parent is-vertical is-2">
			<div class="tile is-child box is-paddingless">
				<nav class="level">
					<p class="level-item has-text-centered">
						<a class="user-dash-trigger">
						<figure class="image dash-img">
							<img src="assets/img/icons/users.png">
						</figure>
						</a>
					</p>
				</nav>
				<nav class="level">
					<p class="level-item title is-6 has-text-centered dash-details">
						View Users
					</p>
				</nav>
			</div>
			
			<div class="tile is-child box is-paddingless">
				<nav class="level">
					<p class="level-item has-text-centered">
						<a class="order-dash-trigger">
						<figure class="image dash-img">
							<img src="assets/img/icons/cart.png">
						</figure>
						</a>
					</p>
				</nav>
				<nav class="level">
					<p class="level-item title is-6 has-text-centered dash-details">
						View Orders
					</p>
				</nav>
			</div>
		</div>
		<div class="tile is-parent is-vertical">
			<div class="tile is-child box">
				<!-- users section -->
				<div class="hide-users" id="dash-users">
				<p class="title">Users:</p>

				<div class="columns">
					<div class="column">
						<p class="title is-4"></p>Username
					</div>
					<div class="column">
						<p class="title is-4"></p>First Name
					</div>
					<div class="column">
						<p class="title is-4"></p>Last Name
					</div>
					<div class="column">
						<p class="title is-4"></p>Address
					</div>
					<div class="column">
						<p class="title is-4"></p>Email
					</div>
					<div class="column">
						<p class="title is-4"></p>Acct Type
					</div>
				</div>


<?php 
	$sql = "SELECT username, firstName, lastName, email, address, type FROM users
			JOIN accounts ON users.userId = accounts.userId
			JOIN accounttype ON accounts.acctType = accounttype.id";

	$result = mysqli_query($dbcon, $sql);

	$checkuser = '';
	while ($dbarray = mysqli_fetch_assoc($result)) { 
		$firstName = $dbarray['firstName'];
		$lastName = $dbarray['lastName'];
		$address = $dbarray['address'];
		$username = $dbarray['username'];
		$email = $dbarray['email'];
		$type = $dbarray['type'];
		
					echo "
				<div class='columns'>
					<div class='column'>
						<p class='title is-5'>";
						if ($checkuser == $username) {
							echo "";
						}
						else {
							echo $username;
						}

						echo "</p>
					</div>
					<div class='column'>
						<p class='title is-6'>
							$firstName
						</p>
					</div>
					<div class='column'>
						<p class='title is-6'>
							$lastName
						</p>
					</div>
					<div class='column'>
						<p class='title is-6'>
							$address
						</p>
					</div>
					<div class='column'>
						<p class='title is-6'>
							$email
						</p>
					</div>
					<div class='column'>
						<p class='title is-6'>
							$type
						</p>
					</div>
				</div>";

					$checkuser = $username;

					} ?>
				</div>
				<!-- /users -->

				<!-- orders section -->
				<div class="hide-orders" id="dash-orders">
				<p class="title">Orders:</p>

				<div class="columns">
					<div class="column">
						<p class="title is-4"></p>Username
					</div>
					<div class="column">
						<p class="title is-4"></p>Item Name
					</div>
					<div class="column">
						<p class="title is-4"></p>Item Id
					</div>
					<div class="column">
						<p class="title is-4"></p>Quantity
					</div>
				</div>
				<!-- /orders -->

<?php 
	$sql = "SELECT username, orders.itemId, items.name, quantity FROM orders
			JOIN accounts ON accounts.acctId = orders.acctId
			JOIN items ON orders.itemId = items.itemId";
			

	$result = mysqli_query($dbcon, $sql);

	$checkuserorder = '';
	while ($dbarray = mysqli_fetch_assoc($result)) { 
		$itemId = $dbarray['itemId'];
		$qty = $dbarray['quantity'];
		$name = $dbarray['name'];
		$username = $dbarray['username'];
		
					echo "
				<div class='columns'>
					<div class='column'>
						<p class='title is-5'>";
						if ($checkuserorder == $username) {
							echo "";
						}
						else {
							echo $username;
						}

						echo "</p>
					</div>
					<div class='column'>
						<p class='title is-6'>
							$name
						</p>
					</div>
					<div class='column'>
						<p class='title is-6'>
							$itemId
						</p>
					</div>
					<div class='column'>
						<p class='title is-6'>
							$qty
						</p>
					</div>
				</div>";

					$checkuserorder = $username;

					} ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
} /* if */
}	//end of function display
require "partials/main.php";

?>