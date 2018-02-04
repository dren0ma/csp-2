<?php 
session_start();
require "dbconnect.php";

/* form values */
$first = $_POST['firstName'];
$last = $_POST['lastName'];
$address = $_POST['address'];
$email = $_POST['email'];
$username = $_POST['userName'];
$password = sha1($_POST['password']);

$sql = "INSERT INTO users (firstName, lastName, address, email) VALUES ('$first', '$last', '$address', '$email')";
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

$id = mysqli_insert_id($dbcon);	/* get userId*/

$sql2 = "INSERT INTO accounts (userName, password, acctType, userId) VALUES ('$username', '$password', '2', '$id')";
mysqli_query($dbcon, $sql2) or die(mysqli_error($dbcon));

$id2 = mysqli_insert_id($dbcon);	/* get acctId*/

$_SESSION['username'] = $userName;
$_SESSION['acctType'] = '2';
$_SESSION['acctId'] = $id2;

header('location: index.php');

?>