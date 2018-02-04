<?php 
session_start();

$id = $_GET['itemId'];
$quantity = $_GET['qty'];

if (isset($_SESSION['cart'][$id])){
	$_SESSION['cart'][$id] += $quantity;
}
else {
	$_SESSION['cart'][$id] = $quantity;	
}


header('location: shop.php');

?>