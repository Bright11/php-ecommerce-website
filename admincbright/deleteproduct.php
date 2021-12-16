<?php
if (isset($_GET['delete'])) {
	$product_id = $_GET['delete'];
$sql="DELETE FROM products WHERE product_id='$product_id'";
if (mysqli_query($conn, $sql)) {
	header("Location:index.php?view_product");
}
}else{
header("Location:index.php?view_product");
}

?>