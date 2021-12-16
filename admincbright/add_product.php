<?php echo $message;?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-6">
    <div class="form-group">
    <label for="name">Product Name</label>
      <input type="text" class="form-control" name="product_title" placeholder="Product Name" required>
    </div>
</div>
    <div class="col-6">
    <div class="form-group">
    <label>Select Category</label>
     <select class="form-control" name="product_cat">
       <option default>Select Category</option>
        <?php
    $sql="SELECT * FROM categories";
    $run=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_object($run)) {
    	?>
    	<option value="<?php echo $row->cat_id;?>"><?php echo $row->cat_title;?></option>
    <?php
    }
       ?>
     </select>
    </div>
</div>
    <div class="col-6">
    <div class="form-group">
    <label>Product Price</label>
      <input type="text" class="form-control" name="product_price" placeholder="Product Price" required>
    </div>
</div>
    <div class="col-6">
    <div class="form-group">
    <label>Select Brand</label>
     <select class="form-control" name="product_brand">
       <option default>Select Brand</option>
        <?php
    $sql="SELECT * FROM brands";
    $run=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_object($run)) {
    	?>
    	<option value="<?php echo $row->brand_id;?>"><?php echo $row->brand_title;?></option>
    <?php
    }
       ?>
     </select>
    </div>
   </div>
    <div class="col-6">
    <div class="form-group">
    <label for="name">Product Keywords</label>
     <textarea class="form-control" name="product_keywords" placeholder="Product Keywords" required></textarea>
    </div>
</div>
   <div class="col-6">
    <div class="form-group">
    <label for="name">Product Description</label>
     <textarea class="form-control" name="product_desc" placeholder="Product Description" required></textarea>
    </div>
    </div>
</div>
    <div class="form-group mt-4">
    <label for="name">Product Image</label>
     <input type="file" class="form-control" name="product_image" required>
    </div>
    
    <div class="form-group mt-4">
     <input type="submit" class="form-control" name="add_prodcut" style="background-color: green; font-size: 20px; font-weight: 30px; letter-spacing: 2px;color: white;">
    </div>
  

</form>