<?php
if (isset($_GET['cat'])) {
	$cat_id = $_GET['cat'];
$sql="DELETE FROM categories WHERE cat_id='$cat_id'";
if (mysqli_query($conn, $sql)) {
	header("Location:index.php?addcat");
}
}else{
header("Location:index.php?addcat");
}

?>