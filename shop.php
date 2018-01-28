<?php 
function display_title(){
	echo "Shop";
}
function display_content() { 
require 'dbconnect.php';

//get item details
$sql = "SELECT name, description, price, img, brand
		FROM items
		JOIN brands ON items.brandId = brands.brandId";
$result = mysqli_query($dbcon, $sql);

?>
<section class="section">
	<div class="container is-fluid">
		<div class="columns is-multiline">

<?php while ($dbarray = mysqli_fetch_assoc($result)) {
	$img = $dbarray['img'];
	?>
			<div class="column is-one-quarter">
				<div class="card">
					<div class="card-content ">
						<p class="title is-4 card-title"><?php echo $dbarray['brand'] ?></p>
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
									<p class="title is-5">₱ <?php echo $dbarray['price'] ?></p>	
								</div>
							</div>
							<div class="level-right">
								<a class="button is-primary" type="button">
									<span class="icon">
										<i class="fas fa-shopping-cart"></i>
									</span>
									<span>Add to Cart</span>
								</a>
							</div>
						</nav>
					</div>
				</div>	
			</div>
<?php	 
}

}	//end of function display
require "partials/main.php";
?>