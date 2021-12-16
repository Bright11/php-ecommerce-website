<?php include'include/header.php';
include"include/navber.php";?>
<div class="container text-center" style="margin-top: 80px;">
<?php 
include("db/db.php");
include("useripaddress/userip.php");
$grand_total = 0;
$allItems = '';
$items = array();

$sqli = "SELECT CONCAT(product_title, '(',qty,')') AS ItemQty, total_price FROM cart WHERE  ip_address='$ip'";
$stmt = $conn->prepare($sqli);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
	$grand_total +=$row['total_price'];
	$items[] = $row['ItemQty'];
}
$allItems = implode("", $items);
?>

<div class="row justify-content-center">
<div class="col-lg-6 px-4 pb-4" id="order">
<h4 class="text-center text-info p-2">Complete your order!</h4>
<div class="jumbotron p-3 mb-2 text-center">
<h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
<h6 class="lead"><b>Delivery charge : </b>Free</h6>
<h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>-/</h5>
</div>
</div>
</div>

<!-----C9234VNJZGHZ2-sb-7pzcl1566302@business.example.com-->
<!--form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"-->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" >
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="sb-7pzcl1566302@business.example.com">
<input type="hidden" name="lc" value="NG">
<input type="hidden" name="item_name" value="<?= $allItems; ?>">
<input type="hidden" name="amount" value="<?= number_format($grand_total,2) ?>">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="rm" value="1">
<input type="hidden" name="return" value="http://localhost/paaypal%20ecommerc/success_p.php">
<input type="hidden" name="cancel_return" value="http://localhost/paaypal%20ecommerc/cancelpayment.php">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
<input type="hidden" name="notify_url" value="http://localhost/paaypal%20ecommerc/success_p.php">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</div>

<?php include"include/footer.php";?>