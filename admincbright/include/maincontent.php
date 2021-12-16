<div class="col-md-8" id="maincontent">
<?php
if (isset($_GET['add_product'])) {
	include("add_product.php");
}
if (isset($_GET['view_product'])) {
	include("view_product.php");
}
if (isset($_GET['update'])) {
	include("update_product.php");
}
if (isset($_GET['delete'])) {
	include("deleteproduct.php");
}

if (isset($_GET['addbrand'])) {
	include("add_brand.php");
}
if (isset($_GET['addcat'])) {
	include("add_cat.php");
}
if (isset($_GET['updatecat'])) {
	include("updatecat.php");
}
if (isset($_GET['cat'])) {
	include("deletecat.php");
}
if (isset($_GET['upbrand'])) {
	include("updatebrand.php");
}
if (isset($_GET['delebrand'])) {
	include("deletebrand.php");
}
if (isset($_GET['orders'])) {
	include("vieworders.php");
}
?>
</div>