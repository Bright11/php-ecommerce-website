<?php
if (isset($_GET['delebrand'])) {
	$brand_id = $_GET['delebrand'];
$sql="DELETE FROM brands WHERE brand_id='$brand_id'";
if (mysqli_query($conn, $sql)) {
	header("Location:index.php?addbrand");
}
}else{
header("Location:index.php?addbrand");
}

?>