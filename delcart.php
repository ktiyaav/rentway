<?php 
session_start();
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if(isset($_GET['remove']) & !empty($_GET['remove'])){
	unset($_SESSION['cart']);
//	$delitem = $_GET['remove'];
//	unset($cartitems[$delitem]);
//	$itemids = implode(",", $cartitems);
//	$_SESSION['cart'] = $itemids;
}
header('location:shop.php');