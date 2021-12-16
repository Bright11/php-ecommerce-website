<?php
function product(){
include"db/db.php";
if (!isset($_GET['category'])) {
  if (!isset($_GET['brand'])) {
$stmt = $conn->prepare("SELECT * FROM products LIMIT 12");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0) {
	while ($row= $result->fetch_assoc()) {
		?>
		<div class="col-lg-4 col-md-6 mb-4">
            <div class="card img">
              <a href="#"><img class="card-img-top" src="proimg/<?= $row['product_image'];?>" alt="<?= $row['product_title']; ?>"></a>
              <div id="new">New</div>
              <div class="card-body name">
                <h6 class="card-title">
                  <a href="#"><?= $row['product_title']; ?></a>
                </h6>
                <h5>$<?= $row['product_price']; ?></h5>
                <p class="card-text details"><a href="#view<?php echo $row['product_id'];?>" data-toggle="modal" >View&nbsp;&nbsp;<i class='far fa-eye'></i> Details</a></p>
              </div>
              <form class="myform">
              
              <input type="hidden" name="product_title" value="<?= $row['product_title'];?>">
               <input type="hidden" name="product_image" value="<?= $row['product_image'];?>">
               
                <input type="hidden" name="product_price" value="<?= $row['product_price'];?>">
                <div class="addtocart">
                <button>Add to cart&nbsp;&nbsp;<i class='fas fa-cart-plus'></i></button> 
                </div>
              </form>
             
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

	<?php
	include"details.php";
	}
}
}
}
}


//categories
function category(){
include("db/db.php");
$sql="SELECT * FROM categories";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($row=$run->fetch_assoc()) {
   ?>
   <a href="index.php?category=<?= $row['cat_id'];?>" class="list-group-item"><?= $row['cat_title'];?></a>
  <?php
  }
}else{
?>
<h4>No category Available</h4>
<?php
}
}


function brand(){
include("db/db.php");
$sql="SELECT * FROM brands";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($row=$run->fetch_assoc()) {
   ?>
   <a href="index.php?brand=<?= $row['brand_id'];?>" class="list-group-item"><?= $row['brand_title'];?></a>
  <?php
  }
}else{
?>
<h4>No Brand Available</h4>
<?php
}
}


function getcat(){
include("useripaddress/userip.php");
require("db/db.php");
if (isset($_GET['category'])) {
  $cat_id = $_GET['category'];

$stmt = $conn->prepare("SELECT * FROM products WHERE product_cat='$cat_id'");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0) {
while ($row= $result->fetch_assoc()) {
    ?>
    <div class="col-lg-4 col-md-6 mb-4">
            <div class="card img">
              <a href="#"><img class="card-img-top" src="proimg/<?= $row['product_image'];?>" alt="<?= $row['product_title']; ?>"></a>
              <div id="new">New</div>
              <div class="card-body name">
                <h6 class="card-title">
                  <a href="#"><?= $row['product_title']; ?></a>
                </h6>
                <h5>$<?= $row['product_price']; ?></h5>
                <p class="card-text details"><a href="#view<?php echo $row['product_id'];?>" data-toggle="modal" >View&nbsp;&nbsp;<i class='far fa-eye'></i> Details</a></p>
              </div>
              <form class="myform">
              
              <input type="hidden" name="product_title" value="<?= $row['product_title'];?>">
               <input type="hidden" name="product_image" value="<?= $row['product_image'];?>">
               
                <input type="hidden" name="product_price" value="<?= $row['product_price'];?>">
                <div class="addtocart">
                <button>Add to cart&nbsp;&nbsp;<i class='fas fa-cart-plus'></i></button> 
                </div>
              </form>
             
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

  <?php
  include"details.php";
  }
}else{
  ?>
  <h3 class="noitem text-center">No Product were found in this category!</h3>
<?php
}
}
}

function getbrand(){
include("useripaddress/userip.php");
require("db/db.php");
if (isset($_GET['brand'])) {
  $brand_id = $_GET['brand'];

$stmt = $conn->prepare("SELECT * FROM products WHERE product_brand='$brand_id'");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0) {
while ($row= $result->fetch_assoc()) {
    ?>
    <div class="col-lg-4 col-md-6 mb-4">
            <div class="card img">
              <a href="#"><img class="card-img-top" src="proimg/<?= $row['product_image'];?>" alt="<?= $row['product_title']; ?>"></a>
              <div id="new">New</div>
              <div class="card-body name">
                <h6 class="card-title">
                  <a href="#"><?= $row['product_title']; ?></a>
                </h6>
                <h5>$<?= $row['product_price']; ?></h5>
                <p class="card-text details"><a href="#view<?php echo $row['product_id'];?>" data-toggle="modal" >View&nbsp;&nbsp;<i class='far fa-eye'></i> Details</a></p>
              </div>
              <form class="myform">
              
              <input type="hidden" name="product_title" value="<?= $row['product_title'];?>">
               <input type="hidden" name="product_image" value="<?= $row['product_image'];?>">
               
                <input type="hidden" name="product_price" value="<?= $row['product_price'];?>">
                <div class="addtocart">
                <button>Add to cart&nbsp;&nbsp;<i class='fas fa-cart-plus'></i></button> 
                </div>
              </form>
             
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

  <?php
  include"details.php";
  }
}else{
  ?>
  <h3 class="noitem text-center">No Product were found in this Brand!</h3>
<?php
}
}

}
?>
