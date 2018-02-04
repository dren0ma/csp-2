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
<div class="indeximg">
	<div class="section">
		<div class="container">
	<figure class="image is-16by9">
		<img src="assets/img/front2.jpeg">
	</figure>
	</div>
	</div>

<div class="section">
	<div class="level">
		<p class="level-item title is-2">Browse our Collection</p>
	</div>
</div>

<div class="section indeximg">
	<div class="columns">
		<div class="column">
			<?php echo "<a href='sort.php?sort=bp'>"?>
				<p class="title is-4 has-text-centered">Backpack</p>
				<figure class="image is-square">
					<img src="assets/img/bags/backpack/jansportbackred.png">
				</figure>	
			</a>
		</div>
		<div class="column">
			<?php echo "<a href='sort.php?sort=lap'>"?>
				<p class="title is-4 has-text-centered">Laptop</p>
				<figure class="image is-square">
					<img src="assets/img/bags/backpack/caselogicbackblack.png">
				</figure>	
			</a>
		</div>
		<div class="column">
			<?php echo "<a href='sort.php?sort=msgr'>"?>
				<p class="title is-4 has-text-centered">Messenger</p>
				<figure class="image is-square">
					<img src="assets/img/bags/messenger/bellinormsgrblue.png">
				</figure>	
			</a>
		</div>
		<div class="column">
			<?php echo "<a href='sort.php?sort=sports'>"?>
				<p class="title is-4 has-text-centered">Sports</p>
				<figure class="image is-square">
					<img src="assets/img/bags/sports/underarmorsportssteel.png">
				</figure>	
			</a>
		</div>
		<div class="column">
			<?php echo "<a href='sort.php?sort=out'>"?>
				<p class="title is-4 has-text-centered">Outdoor</p>
				<figure class="image is-square">
					<img src="assets/img/bags/outdoor/outdoorskylineblue.png">
				</figure>	
			</a>
		</div>
	</div>
		
		
</div>
</div>



<?php 	
}

require "partials/main.php";
?>