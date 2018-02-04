<?php
session_start();

$id = $_POST['qtyCartId'];

$_SESSION['cart'][$id] = $_POST['qty'];

?>