<?php 
function display_title(){
	echo "View Collection";
}
function display_content() { 
require 'dbconnect.php';

?>
<!-- filters -->
<div class="section">
	<p class="title is-5">Filters:</p>
	<nav class="level">
		<div class="level-left">
			<div class="level-item ">
				<div class="buttons">
					<?php echo "<a href='sort.php?sort=all' class='button is-outlined'>" ?>
						All Bags
					</a>
					<?php echo "<a href='sort.php?sort=bp' class='button is-outlined'>" ?>
						Backpack
					</a>
					<?php echo "<a href='sort.php?sort=lap' class='button is-outlined'>" ?>
						Laptop
					</a>
					
					<?php echo "<a href='sort.php?sort=msgr' class='button is-outlined'>" ?>
						Messenger
					</a>
					<?php echo "<a href='sort.php?sort=sports' class='button is-outlined'>" ?>
						Sports
					</a>
					<?php echo "<a href='sort.php?sort=out' class='button is-outlined'>" ?>
						Outdoor
					</a>
				</div>
			</div>
		</div>
	</nav>
</div>
<!-- items -->
<div class="columns">
	<div class="column">
		<div class="container is-fluid">
			<div class="columns is-multiline">
	<?php 
	if ((isset($_SESSION['sort'])) && ($_SESSION['sort'] != 0)) {
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

	// add item card
	if (isset($_SESSION['acctType']) && ($_SESSION['acctType'] == 1)) { ?>
				<div class="column is-one-fifth">
					<div class="card">
						<div class="card-content item-card">
							<p class="title is-5 card-title">Add Item</p>
							<p class="subtitle is-5 card-subtitle">-</p>
						</div>
						<a href="additem.php">
							<div class="card-image">
								<figure class="image is-square">
									<img src="assets/img/icons/add.png" alt="Add Item">
								</figure>
							</div>
						</a>
						<div class="card-content item-card">
							<nav class="level">
								<div class="level-left">
									<div class="level-item has-text-centered">
										<p class="title is-6">₱ 0</p>	
									</div>
								</div>
								<div class="level-right">
									<a class="button is-outlined button-border-remove" type="button">
										<span class="icon">
											<i class="fas fa-shopping-cart"></i>
										</span>
									</a>
								</div>
							</nav>
						</div>
					</div>	
				</div>	
	<?php }
	else {
		$_SESSION['acctType'] = 2;
	}

	// display item cards
	while ($dbarray = mysqli_fetch_assoc($result)) {
		$img = $dbarray['img'];	
		$id = $dbarray['itemId'];
		?>

				<div class="column is-one-fifth">
					<div class="card">
						<?php 
						if ($_SESSION['acctType'] == 1) {
							echo "<a href='deleteshopitem.php?id=$id' type='button' data-index='$id' class='button shop-item-delete button-border-remove'>
								<figure class='image is-24x24 delete-item'>
									<img src='assets/img/icons/exit.png'>
								</figure>
								<a href='edititem.php?id=$id' type='button' data-index='$id' class='button shop-item-edit button-border-remove'>
								<figure class='image is-24x24 delete-item'>
									<img src='assets/img/icons/edit.png'>
								</figure>
							</a>";
						} ?>
						<div class="card-content item-card">
							<p class="title is-5 card-title"><?php echo $dbarray['brand'] ?></p>
							<p class="subtitle is-6 card-subtitle"><?php echo $dbarray['name'] ?></p>
						</div>
						<div class="card-image">
							<a <?php echo "href='viewitem.php?itemId=$id'>";?>
								<figure class="image is-square">
									<img class="view-img"<?php echo "src='$img' alt='Bag'>"; ?>
								</figure>
							</a>
						</div>
						<div class="card-content item-card">
							<nav class="level">
								<div class="level-left">
									<div class="level-item has-text-centered">
										<p class="title is-6">₱ <?php echo $dbarray['price'] ?></p>	
									</div>
								</div>
								<div class="level-right">
									<div class="level-item">
										<a class="button is-outlined button-border-remove" type="button" 
										<?php echo "href='viewitem.php?itemId=$id'>";?>
											<span class="icon">
												<i class="fas fa-search"></i>
											</span>
										</a>
									</div>
									<div class="level-item">
										<a class="button is-outlined button-border-remove addtocart" type="button" 
										<?php echo "href='addtocart.php?itemId=$id&qty=1'>";?>
											<span class="icon">
												<i class="fas fa-shopping-cart"></i>
											</span>
										</a>
									</div>
								</div>
							</nav>
						</div>
					</div>	
				</div>	<!-- /item cards -->
	<?php } ?>
			</div>
		</div>
	</div>
</div>	<!-- columns -->
<?php
}	//end of function display
require "partials/main.php";

?>