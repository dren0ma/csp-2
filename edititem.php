<?php 
function display_title(){
	echo "Add Item";
}
function display_content() { 
require "dbconnect.php";

$id = $_GET['id'];

$sql = "SELECT * FROM items 
		JOIN brands ON items.brandId = brands.brandId
		JOIN item_categories ON items.itemId = item_categories.itemId
		WHERE items.itemId = '$id'";

$result = mysqli_query($dbcon, $sql);
$dbarray = mysqli_fetch_assoc($result);
extract($dbarray);

?>
	
<form class="container" action="editshopitem.php?id=<?php echo $itemId; ?>" method="POST">
	<div class="columns is-multiline">
		<div class="column is-5">
			<p class="title">Item Information</p>
			<div class="field ">
				<label class="label">Item Name:</label>
				<div class="control">
					<input class="input" type="text" placeholder="Name" name="itemName" value="<?php echo $dbarray['name']?>"></input>
				</div>
			</div>
			<div class="field ">
				<label class="label">Brand:</label>
				<div class="control">
					<input class="input" type="text" placeholder="Brand" name="itemBrand" value="<?php echo $dbarray['brand']?>"></input>
				</div>
			</div>
			<div class="field ">
				<label class="label">Description:</label>
				<div class="control">
					<textarea class="textarea" name="itemDescription">
						<?php echo $dbarray['description']?>
					</textarea>
				</div>
			</div>
			<div class="field ">
				<label class="label">Price:</label>
				<div class="control">
					<input class="input" type="number" placeholder="Price" name="itemPrice" value="<?php echo $dbarray['price']?>"></input>
				</div>
			</div>
			<div class="field ">
				<label class="label">Image:</label>
				<div class="control">
					<input class="input" type="text" placeholder="Image" name="itemImage" value="<?php echo $dbarray['img']?>"></input>
				</div>
			</div>
			<div class="field ">
				<label class="label">Category:</label>
				<div class="control">
					<div class="select">
						<select name="itemCategory" required>
							<option>Categories</option>
							<option value="1">Backpack</option>
							<option value="2">Laptop</option>
							<option value="3">Messenger</option>
							<option value="4">Outdoor</option>
							<option value="5">Sports</option>
						</select>
					</div>
				</div>
			</div>
			<div class="field">
				<input class="button is-dark is-expanded" type="submit" name="editItemForm" id="editItemForm" value="Save">
			</div>
				
		</div>	
	</div>
</form>

<?php 	
}
require "partials/main.php";
?>

