<?php 
session_start();
require "dbconnect.php";


$id = $_GET['id'];
/* form values */
$name = $_POST['itemName'];
$brand = $_POST['itemBrand'];
$description = $_POST['itemDescription'];
$price = $_POST['itemPrice'];
$image = $_POST['itemImage'];
$category = $_POST['itemCategory'];

$sql = "SELECT brandId FROM brands WHERE brand = '$brand'";
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

$sql = "UPDATE items SET 
	name = '$name',
	brandId = '$brandId',
	description = '$description',
	price = '$price',
	img = '$image'
	WHERE items.itemId = '$id'";

mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

$sql = "UPDATE item_categories SET 
	categoryId = '$category'
	WHERE item_categories.itemId = '$id'";

mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

header('location: shop.php');

?>

