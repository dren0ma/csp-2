<?php 
function display_title(){
	echo "Shop";
}
function display_content() { 
require 'dbconnect.php';

?>
<div class="section">
	<nav class="level">
		<div class="level-item">
			<a <?php echo "href='sort.php?sort=bp' class='button is-outlined'>" ?>
				Backpack
			</a>
		</div>
		<div class="level-item">
			<a <?php echo "href='sort.php?sort=lap' class='button is-outlined'>" ?>
				Laptop
			</a>
		</div>
		<div class="level-item">
			<a <?php echo "href='sort.php?sort=msgr' class='button is-outlined'>" ?>
				Messenger
			</a>
		</div>
		<div class="level-item">
			<a <?php echo "href='sort.php?sort=sports' class='button is-outlined'>" ?>
				Sports
			</a>
		</div>
		<div class="level-item">
			<a <?php echo "href='sort.php?sort=out' class='button is-outlined'>" ?>
				Outdoor
			</a>
		</div>
	</nav>
</div>
<div class="columns">
	<!-- display item cards -->
	<div class="column">
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
	if (isset($_SESSION['sort'])) {
		$category = $_SESSION['sort'];

		$sql = "SELECT items.itemId, name, description, price, img, brand
				FROM items
				JOIN brands ON items.brandId = brands.brandId
				JOIN item_categories ON items.itemId = item_categories.itemId
				WHERE categoryId = $category";
	}
	else {
		$sql = "SELECT itemId, name, description, price, img, brand
				FROM items
				JOIN brands ON items.brandId = brands.brandId";
	}

	$result = mysqli_query($dbcon, $sql);

	while ($dbarray = mysqli_fetch_assoc($result)) {
		$img = $dbarray['img'];	
		$id = $dbarray['itemId']; ?>
				<div class="column is-one-quarter">
					<div class="card">
						<div class="card-content item-card">
							<p class="title is-5 card-title"><?php echo $dbarray['brand'] ?></p>
							<p class="subtitle is-6 card-subtitle"><?php echo $dbarray['name'] ?></p>
						</div>
						<div class="card-image">
							<figure class="image is-square">
								<img <?php echo "src='$img'"?> alt="Placeholder image">
							</figure>
						</div>
						<div class="card-content item-card">
							<nav class="level">
								<div class="level-left">
									<div class="level-item has-text-centered">
										<p class="title is-6">₱ <?php echo $dbarray['price'] ?></p>	
									</div>
								</div>
								<div class="level-right">
									<a class="button is-outlined button-border-remove" type="button" 
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