<?php 
function display_title(){
	echo "Contact Us";
}
function display_content() { 
require 'dbconnect.php';

?>
<!-- <div class="card-image">
	<figure class="image is-square">
		<img src="assets/img/additem.png" alt="Add Item">
	</figure>
</div> -->
<p class="image is-square img-size">
	<img src="assets/img/additem.png" alt="">
</p>

<?php
}	//end of function display
require "partials/main.php";

?>