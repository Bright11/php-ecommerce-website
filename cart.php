<?php include'include/header.php';
include"include/navber.php";?>
<div class="container" style="margin-top: 80px;">

<div class="table-responsive mt-2">
<table class="table table-bordered table-striped text-center">
<thead>
	<tr>
<td colspan="7">
<?php

 include("useripaddress/userip.php");
 $stmt = $conn->prepare("SELECT * FROM cart WHERE ip_address=?");
  $stmt->bind_param("s",$ip);
  $stmt->execute();
  $stmt->store_result();
 $count = $stmt->num_rows;
  //echo $count;
  if ($count>0) {
 ?>
<h3 class="text-center text-info m-0">Your Cart Items</h3>
 <?php
  	}else{
  		?>
  <h3 class="text-center text-info m-0">No items in your cart</h3>
  <?php
  	}
  ?>

</td>
</tr>
<tr>
<th>ID</th>
<th>Image</th>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total Price</th>
<th><a href="actions/deletecart.php?clear=<?php echo $ip;?>" class="badge-danger badge p-1" onclick="return confirm('Are you sure you want clear your cart?');"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Clear Cart</a></th>
<th>Update</th>
</tr>
</thead>
<tbody>
<?php
include("db/db.php");
include("useripaddress/userip.php");
$stmt = $conn->prepare("SELECT * FROM cart WHERE ip_address='$ip'");
$stmt->execute();
$result = $stmt->get_result();
$grand_total=0;
while ($row = $result->fetch_assoc()) {
	?>
<tr>
<td><?= $row['product_id'];?></td>
<form action="actions/action.php" method="post">
<input type="hidden" name="product_id" value="<?= $row['product_id'];?>">
<input type="hidden" name="ip_address" value="<?php echo $ip; ?>">
<td><img src="proimg/<?= $row['product_image'];?>" width="50"></td>
<td><?= $row['product_title']; ?></td>
<td>&#x20B5; &nbsp;&nbsp;<?= number_format($row['product_price'],2) ?></td>
<input type="hidden" name="product_price" value="<?= $row['product_price']?>">
<td><input type="number" name="qty" class="form-control" value="<?= $row['qty']?>" style="width:75px;"></td>
<td>&#x20B5; &nbsp;&nbsp;<?= number_format($row['total_price'],2) ?></td>
<td>
<a href="actions/deletecart.php?remove=<?= $row['product_id']?>" class="text-danger lead" onclick="return confirm('Are you sure you want to remove this item?');" ><i class="fas fa-trash-alt"></i>Remove</a>
</td>
<td><input type="submit" name="updatecart" value="Update"></td>
</form>
</tr>
<?php $grand_total +=$row['total_price'];?>
<?php
}
?>
<tr>
<td colspan="3">
<a href="index.php" class="btn btn-success"><i class='fas fa-cart-plus'></i>&nbsp;&nbsp;Continue shopping</a>
</td>
<td colspan="2">Grand Total</td>
<td>&#x20B5; &nbsp;&nbsp;<?= number_format($grand_total,2) ?></td>
<td colspan="2">
<a href="#" class="btn btn-info <?=($grand_total>1)?"":"disabled"; ?>"><i class='fas fa-credit-card'></i>&nbsp;&nbsp;Checkout</a>
</td>
</tr>
</tbody>
</table>
</div>

<?php include"include/footer.php";?>
