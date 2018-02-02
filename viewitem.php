<?php 
function display_title(){
	echo "item";
}
function display_content() { 
require 'dbconnect.php';

$id = $_GET['itemId'];

$sql = "SELECT name, description, price, img, brand, items.itemId
				FROM items
				JOIN brands ON items.brandId = brands.brandId
				WHERE items.itemId = $id";

$result = mysqli_query($dbcon, $sql);
$dbarray = mysqli_fetch_assoc($result);
extract($dbarray);


?>
<section class="section">
	<div class="columns">
		<div class="column">
			<figure class="image">
				<img src="<?php echo $img ?>">
			</figure>
		</div>
		<div class="column">
			<p class="title"><?php echo $brand ?></p>
			<p class="subtitle"><?php echo $name ?></p>
			<p><?php echo $description ?></p>
			<?php 
			$sql = "SELECT img, colorId FROM item_colors
				JOIN items ON item_colors.itemId = items.itemId
				WHERE item_colors.itemId = $id";

			$result = mysqli_query($dbcon, $sql);
			while ($dbarray = mysqli_fetch_assoc($result)) {
			$img = $dbarray['img'];	
			$color = $dbarray['colorId'];?>
				<figure class="image is-64x64">
					<img src="<?php echo $img ?>">
				</figure>
			<?php } ?>
			<form <?php echo "action='addtocart.php?itemId=$itemId'>" ?>
				<div class="field">
					<p class="control">
						<input type="number" name="qty" class="input">
					</p>
					<p class="control">
						<input class="button is-dark" type="submit" value="Add to Cart"></input>		
					</p>
				</div>
			</form>
		</div>
	</div>
</section>





<?php
}	//end of function display
require "partials/main.php";

?>