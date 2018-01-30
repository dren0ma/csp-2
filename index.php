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

<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<div class="tile is-ancestor">
		<div class="tile is-parent is-8 is-vertical">
			<div class="box is-child">
				asdasdasdasdasdasdasdasdasdasd
			</div>
			<div class="box is-child">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
		</div>
		
	</div>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()">open</span>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">
  ...
</div>




<?php 	
}

require "partials/main.php";
?>