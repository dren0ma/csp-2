<?php 
function display_title(){
	echo "Item Information";
}
function display_content() { 
require 'dbconnect.php';

$id = $_GET['itemId'];

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
					<img src="<?php echo $img ?>">
				</figure>
			</div>
			<div class="column">
				<p class="title"><?php echo $brand ?></p>
				<p class="subtitle"><?php echo $name ?></p>
				<p><?php echo $description; ?></p>
				
				<?php echo "<form action='addtocart.php' method='GET'>"; ?>
					<div class="field">
						<p class="control">
							<input type="number" name="qty" class="input">
						</p>
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