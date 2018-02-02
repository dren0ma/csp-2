<?php 
function display_title(){
	echo "Cart";
}
function display_content() { 
require 'dbconnect.php';
if(isset($_SESSION['cart'])){

}
else {
	echo "EMPTY";
}
	//foreach item iteration
	foreach ($_SESSION['cart'] as $id => $quantity) {
		$sql = "SELECT name, img, price, brand, itemId
				FROM items 
				JOIN brands ON items.brandId = brands.brandId
				WHERE itemId = '$id'";
		$result = mysqli_query($dbcon, $sql);
		$dbarray = mysqli_fetch_assoc($result);
		extract($dbarray);							//auto create variables from column_name

			if (isset($_SESSION['cart'])){ ?>
			<div class="container">
				<div class="section cart-section">
					<div class="columns is-vcentered">
						<!-- item img -->
						<div class="column is-one-fifth is-offset-1">
							<?php echo "<a href='deletecartitem.php?id=$id'>" ?>
							<figure class="image is-24x24 delete-item">
								<img src="assets/img/icons/exit.png">
							</figure>
							</a>
							<figure class="image is-128x128">
								<img src="<?php echo $img; ?>">
							</figure>
						</div>
						<!-- item name, brand -->
						<div class="column is-one-fifth">
							<p class="title is-5">
								<?php echo $brand; ?>
							</p>
							<p class="subtitle">
								<?php echo $name; ?>
							</p>
						</div>
						<!-- item qty -->
						<div class="column is-one-fifth">
							<nav class="level">
								<div class="level-item">
									<a class="button btnLeft button-border-remove" type="button" data-id="<?php echo $id; ?>" >
									<span class="icon">
										<i class="fas fa-angle-left"></i>
									</span>
									</a>
								</div>
								<div class="level-item">
									<label class="label" >
										<?php echo "<span id='qtyCart".$id."'>$quantity</span>"?>
									</label>
								</div>
								<div class="level-item">
									<a class="button btnRight button-border-remove" type="button" data-id="<?php echo $id; ?>">
									<span class="icon">
										<i class="fas fa-angle-right"></i>
									</span>
									</a>
								</div>
							</nav>
						</div>
						<!-- item total -->
						<div class="column is-one-fifth">
							<?php echo "<span class='title is-6 has-text-centered' id='itemPrice".$id."' data-price='$price'>";
								echo ($price * $quantity); ?>
							</span>
						</div>
					</div>
				</div>
			</div>	<!-- /container -->
			
			<?php }	// /if
	} ?>	<!-- foreach  -->
	<div class="section">
		<nav class="level">
			<div class="level-item">
				<a href="" class="button is-dark checkout">
					Checkout
				</a>
			</div>
		</nav>
	</div>


<?php
}	//function display
require "partials/main.php";
?>

