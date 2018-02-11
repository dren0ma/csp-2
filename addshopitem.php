<?php 
session_start();
require "dbconnect.php";

/* form values */

$name = mysqli_real_escape_string($dbcon, $_POST['itemName']);
$brand = mysqli_real_escape_string($dbcon, $_POST['itemBrand']);
$description = mysqli_real_escape_string($dbcon, $_POST['itemDescription']);
$price = mysqli_real_escape_string($dbcon, $_POST['itemPrice']);
$image = mysqli_real_escape_string($dbcon, $_POST['itemImage']);
$category = mysqli_real_escape_string($dbcon, $_POST['itemCategory']);

$sql = "SELECT * FROM brands WHERE brand = $brand";
$result = mysqli_query($dbcon, $sql);

if(mysqli_num_rows($result) > 0){
	$dbarray = mysqli_fetch_assoc($result);
	$brandId = $dbarray['brandId'];
}
else {
	$sql = "INSERT INTO brands (brand) VALUES ('$brand')";
	mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
	$brandId = mysqli_insert_id($dbcon);	/* get brandId*/
}


$sql = "INSERT INTO items (name, brandId, description, price, img) VALUES ('$name', '$brandId', '$description', $price, '$image')";
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

$itemId = mysqli_insert_id($dbcon);	/* get itemId*/

$sql = "INSERT INTO item_categories (itemId, categoryId) VALUES ('$itemId', '$category')";
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

header('location: shop.php');

?>

