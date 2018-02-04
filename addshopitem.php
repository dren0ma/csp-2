<?php 
session_start();
require "dbconnect.php";

/* form values */

$name = $_POST['itemName'];
$brand = $_POST['itemBrand'];
$description = $_POST['itemDescription'];
$price = $_POST['itemPrice'];
$image = $_POST['itemImage'];
$category = $_POST['itemCategory'];

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

