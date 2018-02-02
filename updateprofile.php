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

$sql = "INSERT INTO users (firstName, lastName, address, email) VALUES ('$first', '$last', '$address', '$email')";
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));

$id = mysqli_insert_id($dbcon);	/* get userId*/

$sql2 = "INSERT INTO accounts (userName, password, acctType, userId) VALUES ('$userName', '$password', '2', '$id')";
mysqli_query($dbcon, $sql2) or die(mysqli_error($dbcon));

$id2 = mysqli_insert_id($dbcon);	/* get acctId*/

$sql3 = "INSERT INTO cart (acctId) VALUES ('$id2')";
mysqli_query($dbcon, $sql3) or die(mysqli_error($dbcon));

$_SESSION['username'] = $userName;
$_SESSION['acctType'] = '2';
$_SESSION['acctId'] = $id2;

header('location: index.php');

?>