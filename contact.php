<?php 
function display_title(){
	echo "Contact Us";
}
function display_content() { 
require 'dbconnect.php';

?>
<div class="section" id="contact-col">
	<p class="title is-5">Contact Us</p>
	<p>Email: helpdesk@tuitt.com</p>
	<p>Address: 3rd Floor Caswynn Building, No. 134 Timog Avenue, Sacred Heart, Quezon City </p>
	<p>Contact No.: (02) 282-9520</p>
</div>
<div class="section">
	<p>
		Disclaimer: No copyright infringement is intended. This website was created only for educational purposes and not for profit. Some asset/s used are not owned by the developer/s unless otherwise stated; full credit goes to the owner.
	</p>
</div>

<?php
}	//end of function display
require "partials/main.php";

?>