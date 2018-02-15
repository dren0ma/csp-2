<?php 
session_start();
require "dbconnect.php";

$id = $_GET['itemId'];

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
else {
    echo "You are not logged in";
}



// get acctId
$sql = "SELECT acctId FROM accounts WHERE username = '$username'";
$result = mysqli_query($dbcon, $sql);
$result = mysqli_fetch_assoc($result);
$acctId = $result['acctId'];

// add to favorites
$sql = "INSERT INTO favorites (acctId, itemId) VALUES ('$acctId', '$id')";
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

header('location: shop.php');

?>