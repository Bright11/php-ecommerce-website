<?php// echo $message;?>
<?php
if (isset($_GET['update'])) {
   $product_id = $_GET['update'];
//update products
if (isset($_POST['update_prodcut'])) {
//$id = $_POST['id'];
$nproduct_title = $_POST['nproduct_title'];
$nproduct_price = $_POST['nproduct_price'];
$nproduct_keywords = $_POST['nproduct_keywords'];
$nproduct_desc = $_POST['nproduct_desc'];
$nproduct_image = $_FILES['nproduct_image']['name'];
$nproduct_image_tmp = $_FILES['nproduct_image']['tmp_name'];

move_uploaded_file($nproduct_image_tmp, "../proimg/$nproduct_image");
$sql="UPDATE products SET product_title='$nproduct_title',product_price='$nproduct_price',product_keywords='$nproduct_keywords',product_desc='$nproduct_desc',product_image='$nproduct_image' WHERE product_id='$product_id'";
if (mysqli_query($conn,$sql)) {
    header("Location:index.php?view_product");
}
}
?>

<?php
$stmt=$conn->prepare("SELECT * FROM products WHERE product_id=$product_id");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($row= $result->fetch_assoc()) {

?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-6">
    <label for="name">Product Name</label>
      <input type="text" class="form-control" name="nproduct_title" value="<?php echo $row['product_title'];?>">
    </div>
   
    <div class="col-6">
    <label>Product Price</label>
      <input type="text" class="form-control" name="nproduct_price" value="<?php echo $row['product_price'];?>">
    </div>
    
    <div class="col-6">
    <label for="name">Product Keywords</label>
     <textarea class="form-control" name="nproduct_keywords" ><?php echo $row['product_keywords'];?></textarea>
    </div>
   <div class="col-6">
    <label for="name">Product Description</label>
     <textarea class="form-control" name="nproduct_desc" ><?php echo $row['product_desc'];?></textarea>
    </div>
    </div>
    <div class="form-group mt-4">
    <label for="name">Product Image</label>
     <input type="file" class="form-control" name="nproduct_image"><img src="../proimg/<?php echo $row['product_image'];?>"width="150px" height="100px" >
    </div>
    
    <div class="form-group mt-4">
     <input type="submit" class="form-control" name="update_prodcut" style="background-color: green; font-size: 20px; font-weight: 30px; letter-spacing: 2px;color: white;">
    </div>
  
</form>
<?php

}
}
}else{
header("Location:index.php?view_product");
}
?>
