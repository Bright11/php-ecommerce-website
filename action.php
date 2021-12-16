<?php 
include("../db/db.php");
//if (isset($_POST['submit'])) {
	# code...
include("../useripaddress/userip.php");
//$product_id = $_POST['product_id'];
$product_title = $_POST['product_title'];
$product_image = $_POST['product_image'];
$product_price = $_POST['product_price'];
$qty =1;
$ip_address =$ip;

$stmt= $conn->prepare("SELECT * FROM cart WHERE ip_address=? AND product_title=?");
$stmt->bind_param("ss",$ip_address,$product_title);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0) {
	echo "Item already added into cart";
}
else{

$stmt = $conn->prepare("INSERT INTO cart(product_title,product_image,product_price,qty,ip_address,total_price)VALUES(?,?,?,?,?,?) ");
$stmt->bind_param("ssssss",$product_title,$product_image,$product_price,$qty,$ip_address,$product_price);
$stmt->execute();
echo "ok";
 $stmt->close();
  $conn->close();
}


// updating the cart
if (isset($_POST['updatecart'])) {
	include("../db/db.php");
include("../useripaddress/userip.php");
 $qty = $_POST['qty'];
  $product_id =$_POST['product_id'];
 $ip_address =$_POST['ip_address'];
 $product_price = $_POST['product_price'];

 $tprice = $qty*$product_price;
 $stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE ip_address=? AND product_id=?");
 $stmt->bind_param("isss",$qty,$tprice,$ip,$product_id);
 $stmt->execute();
 header("Location:../cart.php");
}
 
 
  ?>

  
