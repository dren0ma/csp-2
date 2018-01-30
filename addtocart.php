<?php 
session_start();

$id = $_GET['itemId'];
$qty = $_GET['qty'];

if (isset($_SESSION['cart'][$id])){
	$_SESSION['cart'][$id] += $qty;
}
else {
	$_SESSION['cart'][$id] = $qty;	
}

header('location: shop.php');

?>