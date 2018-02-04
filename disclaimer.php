<?php 

function display_title(){
	echo "BagPack Home";
}
function display_content() { 

if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}
else {
	$username = 'Guest';
}
?>
<section class="hero is-fullheight">
	<div class="hero-body">
		<div class="container">
			<h2 class="subtitle">
				Disclaimer: No copyright infringement is intended. This website was created only for educational purposes and not for profit. Some asset/s used are not owned by the developer/s unless otherwise stated; full credit goes to the owner.

			</h2>
		</div>
	</div>
</section>



<?php 	
}

require "partials/main.php";
?>