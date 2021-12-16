<?php
$message='';
include("db/db.php");
if (isset($_POST['add_prodcut'])) {
$product_title = $_POST['product_title'];
$product_cat = $_POST['product_cat'];
$product_price = $_POST['product_price'];
$product_brand = $_POST['product_brand'];
$product_keywords = $_POST['product_keywords'];
$product_desc = $_POST['product_desc'];
$product_image = $_FILES['product_image']['name'];
$product_image_tmp = $_FILES['product_image']['tmp_name'];

if (empty($product_title)) {
	$message='<div style="background:blue;color:white; font-size:20px;">Product Name is empty!..</div>';
}else{
$sql = $conn->query("SELECT * FROM products WHERE product_title='".$product_title."'");
$row=$sql->num_rows;
 if ($row>0) {
  $message='<div style="background:blue;color:white; font-size:20px;">Product name already exist.</div>';
}
elseif ($product_cat=='Select Category') {
  $message='<div style="background:blue;color:white; font-size:20px;">Select category please</div>';
}elseif (empty($product_price)) {
	 $message='<div style="background:blue;color:white; font-size:20px;">Price is empty!..</div>';
}
elseif($product_cat=='Select Brand') {
  $message='<div style="background:blue;color:white; font-size:20px;">Select brand please</div>';
}elseif (empty($product_keywords)) {
	$message='<div style="background:blue;color:white; font-size:20px;">Keywords are empty!..</div>';
}elseif (empty($product_desc)) {
	$message='<div style="background:blue;color:white; font-size:20px;">Description is empty!..</div>';
}elseif (empty($product_image)) {
	$message='<div style="background:blue;color:white; font-size:20px;">Image is empty!..</div>';
}else{
	move_uploaded_file($product_image_tmp, "../proimg/$product_image");
	$stmt = $conn->prepare("INSERT INTO products(product_title,product_cat,product_price,product_brand,product_keywords,product_desc,product_image)VALUES(?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssss",$product_title,$product_cat,$product_price,$product_brand,$product_keywords,$product_desc,$product_image);
	$stmt->execute();
	$message='<div style="background:green;color:white; font-size:20px;">Product added successfully!..</div>';
	$stmt->close();
	$conn->close();
	header("Location:index.php?view_product");
}
}
}


?>