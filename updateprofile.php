<?php 
session_start();
require "dbconnect.php";

$id = $_GET['id'];
/* form values */
$first = $_POST['firstName'];
$last = $_POST['lastName'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = sha1($_POST['password']);

$sql = "UPDATE users SET 
	firstName = '$first',
	lastName = '$last',
	address = '$address',
	email = '$email'
	WHERE userId = '$id'";

mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));


$sql = "UPDATE accounts SET 
	password = '$password'
	WHERE userId = '$id'";

mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

header('location: index.php');

?>