<?php 
function display_title(){
	echo "Item Information";
}
function display_content() { 
require 'dbconnect.php';

$id = $_GET['itemId'];
$quantity = $_GET['qty'];

$sql = "SELECT name, description, price, img, brand, itemId
				FROM items
				JOIN brands ON items.brandId = brands.brandId
				WHERE itemId = '$id'";

$result = mysqli_query($dbcon, $sql);
$dbarray = mysqli_fetch_assoc($result);
extract($dbarray);

?>
<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column">
				<figure class="image">
					<img src="<?php echo $img; ?>">
				</figure>
			</div>
			<div class="column">
				<p class="title"><?php echo $brand ?></p>
				<p class="subtitle"><?php echo $name ?></p>
				<p><?php echo $description; ?></p>
				<!-- item colors -->
				<nav class="level">
					<figure class="level-item">
						
					</figure>
				</nav>
				
				<?php echo "<form action='addtocart.php' method='GET'>"; ?>
				<!-- item qty -->
					<nav class="level">
						<div class="level-left">
							<div class="level-item">
								<p class="level-item title is-6">Quantity:</p>
								<a class="button viewbtnLeft button-border-remove" type="button">
								<span class="icon">
									<i class="fas fa-angle-left"></i>
								</span>
								</a>
							</div>
							<div class="level-item">
								<label class="label">
									<span id='qtyView'>1</span>
								</label>
							</div>
							<input type="number" name="qty" id="qtyView2" class="input hide" value="1">
							<div class="level-item">
								<a class="button viewbtnRight button-border-remove" type="button">
								<span class="icon">
									<i class="fas fa-angle-right"></i>
								</span>
								</a>
							</div>
						<!-- item total -->
							<?php echo "<p class='level-item'>
								<strong>Total:</strong>"; ?>
							</p>
							<?php echo "<p class='level-item' id='itemViewPrice' data-price='$price'>";
								echo ($price * $quantity); ?>
							</p>
						</div>
					</nav>
				<!-- /item qty -->

					<div class="field">
						<p class="control">
							<input type="number" name="itemId" class="input hide" value="<?php echo $id ?>">
						</p>
						<p class="control">
							<input class="button is-dark" type="submit" value="Add to Cart"></input>		
						</p>		
					</div>
				</form>
			</div>
		</div>
	</div>
</section>





<?php
}	//end of function display
require "partials/main.php";

?>