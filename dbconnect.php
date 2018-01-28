<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'plegaspi-csp2';

$dbcon = mysqli_connect($host, $username, $password, $db);
mysqli_set_charset($dbcon, 'utf8');

// if($dbcon)
// 	echo "Connected";
?>