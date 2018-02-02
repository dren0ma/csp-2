<?php
require 'dbconnect.php';

$id = $_GET['id'];

$sql = "DELETE FROM item_categories WHERE itemId = '$id'";
mysqli_query($dbcon, $sql) or die (mysqli_error($dbcon));

$sql = "DELETE FROM item_colors WHERE itemId = '$id'";
mysqli_query($dbcon, $sql) or die (mysqli_error($dbcon));

$sql = "DELETE FROM items WHERE itemId = '$id'";
mysqli_query($dbcon, $sql) or die (mysqli_error($dbcon));



header('location: shop.php')


?>