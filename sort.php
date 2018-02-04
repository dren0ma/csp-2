<?php 
session_start();

$category = $_GET['sort'];

if ($category == 'all') {
	$_SESSION['sort'] = 0;
}
else if ($category == 'bp') {
	$_SESSION['sort'] = 1;	
}
else if ($category == 'lap') {
	$_SESSION['sort'] = 2;	
}
else if ($category == 'msgr') {
	$_SESSION['sort'] = 3;	
}
else if ($category == 'out') {
	$_SESSION['sort'] = 4;	
}
else if ($category == 'sports') {
	$_SESSION['sort'] = 5;	
}


header('location: shop.php');

?>