<?php
session_start();

require 'dbconnect.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($dbcon, $sql);

// verify username/password
if(mysqli_num_rows($result) > 0){
	$dbarray = mysqli_fetch_assoc($result);
	$_SESSION['username'] = $username;
	$_SESSION['acctType'] = $dbarray['acctType'];
	header('location: '.$_SERVER['HTTP_REFERER']);

}
else {
	echo "Incorrect Username/Password";
}
?>