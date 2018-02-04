<?php 
session_start();
require 'dbconnect.php';

$username = $_SESSION['username'];

$sql = "SELECT acctId FROM accounts WHERE username = '$username'";
$result = mysqli_query($dbcon, $sql);
$dbarray = mysqli_fetch_assoc($result);
$acctId = $dbarray['acctId'];

if (isset($_SESSION['cart'])){
	foreach ($_SESSION['cart'] as $id => $quantity) {
		$sql = "INSERT INTO orders (acctId, itemId, quantity)
				VALUES ('$acctId', '$id', $quantity)";

		mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
	}	/* /foreach */
}	/* /if */

header('location: shop.php');

?>