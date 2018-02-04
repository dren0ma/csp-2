<?php 
require "dbconnect.php";
function display_title(){
	echo "Add Item";
}
function display_content() { ?>
<div class="section">
	<form class="container" action="addshopitem.php" method="POST">
		<div class="columns is-multiline">
			<div class="column is-5">
				<p class="title">Item Information</p>
				<div class="field ">
					<label class="label">Item Name:</label>
					<div class="control">
						<input class="input" type="text" placeholder="Name" name="itemName"></input>
					</div>
				</div>
				<div class="field ">
					<label class="label">Brand:</label>
					<div class="control">
						<input class="input" type="text" placeholder="Brand" name="itemBrand"></input>
					</div>
				</div>
				<div class="field ">
					<label class="label">Description:</label>
					<div class="control">
						<textarea class="textarea" name="itemDescription">
							
						</textarea>
					</div>
				</div>
				<div class="field ">
					<label class="label">Price:</label>
					<div class="control">
						<input class="input" type="number" placeholder="Price" name="itemPrice"></input>
					</div>
				</div>
				<div class="field ">
					<label class="label">Image:</label>
					<div class="control">
						<input class="input" type="text" placeholder="Image" name="itemImage"></input>
					</div>
				</div>
				<div class="field ">
					<label class="label">Category:</label>
					<div class="control">
						<div class="select">
							<select name="itemCategory">
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
					<input class="button is-dark is-expanded" type="submit" name="addItemForm" id="addItemForm" value="Add Item">
				</div>
					
			</div>	
		</div>
	</form>
</div>
<?php 	
}
require "partials/main.php";
?>

