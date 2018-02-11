<?php 
session_start();
require "dbconnect.php";

/* form values */
$first = mysqli_real_escape_string($dbcon, $_POST['firstName']);
$last = mysqli_real_escape_string($dbcon, $_POST['lastName']);
$address = mysqli_real_escape_string($dbcon, $_POST['address']);
$email = mysqli_real_escape_string($dbcon, $_POST['email']);
$username = mysqli_real_escape_string($dbcon, $_POST['userName']);
$password = mysqli_real_escape_string($dbcon, sha1($_POST['password']));


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