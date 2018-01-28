<?php 

function display_title(){
	echo "Home";
}
function display_content() { 

	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}
	else {
		$username = 'Guest';
	}
	?>

	<p class="p-test">content</p>


<?php 	
}

require "partials/main.php";
?>