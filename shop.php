<?php 
function display_title(){
	echo "Shop";
}
function display_content() { 
require 'dbconnect.php';

?>
<div class="columns">
	<!-- sidebar -->
	<div class="column is-one-fifth">
		<nav class="panel">
			<p class="panel-heading has-text-centered">Filters</p>
			<div class="panel-block field">
				<p class="control is-expanded has-icons-left">
					<input class="input" type="text">
					<span class="icon is-left"><i class="fas fa-search"></i></span>
				</p>
			</div>

			<p class="panel-heading button is-fullwidth">Category</p>
	<?php 
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($dbcon, $sql);

	while ($dbarray = mysqli_fetch_assoc($result)) { 
		
			echo "	<label class='panel-block panel-font'>
						<input type='checkbox'>";
							echo $dbarray['type'];	
			echo "	</label>";
	} 

			echo "	<p class='panel-heading'>Brand</p>";
	
	$sql = "SELECT * FROM brands";
	$result = mysqli_query($dbcon, $sql);

	while ($dbarray = mysqli_fetch_assoc($result)) { 
		
			echo "	<label class='panel-block panel-font'>
						<input type='checkbox'>";
							echo $dbarray['brand'];	
			echo "	</label>";
	} ?>
			<div class="panel-block">
				<button class="button is-link is-outlined is-fullwidth">
					reset all filters
				</button>
				
			</div>
		</nav>
	</div>

	<!-- display item cards -->
	<div class="column">
	<div class="column">
		<nav class="level">
			<div class="level-left">
				
			</div>
			<div class="level-right">
				<div class="field">
					<div class="control">
						<div class="level-item">
							<button class="button">Sort</button>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>

		<div class="container is-fluid">
			<div class="columns is-multiline">
				<!-- <div class="card">
					<div class="card-content ">
						<p class="title is-5 card-title">asdasdasd</p>
						<p class="subtitle is-6 card-subtitle">zzzzzzzzzz</p>
					</div>
					<div class="card-image">
						<figure class="image is-square">
							<img src="" alt="Placeholder image">
						</figure>
					</div>
					<div class="card-content">
						<nav class="level">
							<div class="level-left">
								<div class="level-item has-text-centered">
									<p class="title is-6">₱ </p>	
								</div>
							</div>
							<div class="level-right">
								<a class="button is-primary" type="button">
									<span class="icon">
										<i class="fas fa-shopping-cart"></i>
									</span>
								</a>
							</div>
						</nav>
					</div>
				</div>	 -->
	<?php 
	$sql = "SELECT itemId, name, description, price, img, brand
			FROM items
			JOIN brands ON items.brandId = brands.brandId";
	$result = mysqli_query($dbcon, $sql);

	while ($dbarray = mysqli_fetch_assoc($result)) {
		$img = $dbarray['img'];	
		$id = $dbarray['itemId']; ?>
				<div class="column is-one-third custom-column-size">
					<div class="card">
						<div class="card-content ">
							<p class="title is-5 card-title"><?php echo $dbarray['brand'] ?></p>
							<p class="subtitle is-6 card-subtitle"><?php echo $dbarray['name'] ?></p>
						</div>
						<div class="card-image">
							<figure class="image is-square">
								<img <?php echo "src='$img'"?> alt="Placeholder image">
							</figure>
						</div>
						<div class="card-content">
							<nav class="level">
								<div class="level-left">
									<div class="level-item has-text-centered">
										<p class="title is-6">₱ <?php echo $dbarray['price'] ?></p>	
									</div>
								</div>
								<div class="level-right">
									<a class="button is-primary" type="button" 
									<?php echo "href='addtocart.php?itemId=$id&qty=1'>";?>
										<span class="icon">
											<i class="fas fa-shopping-cart"></i>
										</span>
									</a>
								</div>
							</nav>
						</div>
					</div>	
				</div>
	<?php } ?>
			</div>
		</div>
	</div>
</div>	<!-- columns -->
<?php
}	//end of function display
require "partials/main.php";

?>