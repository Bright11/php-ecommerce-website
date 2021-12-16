<?php
//Deleting the cart
if (isset($_GET['remove'])) {
$product_id = $_GET['remove'];
include("../db/db.php");
include("../useripaddress/userip.php");
$stmt= $conn->prepare("DELETE FROM cart WHERE product_id=? AND ip_address=?");
$stmt->bind_param("is",$product_id,$ip);
$stmt->execute();
header("Location:../cart.php");
}



//clearing the cart
if (isset($_GET['clear'])) {
	$ip = $_GET['clear'];
	include("../db/db.php");
	include("../useripaddress/userip.php");
	$stmt= $conn->prepare("DELETE FROM cart WHERE ip_address='$ip'");
	$stmt->execute();
	
	header("Location:../cart.php");
}
?>