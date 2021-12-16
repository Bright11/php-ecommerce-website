<!-- Modal -->
<div class="modal fade" id="view<?php echo $row['product_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel text-center"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-3  text-center">
        <!--h1 class="login text-center bg-secondary">Product Details</h1-->
       <?php
          $view=mysqli_query($conn,"SELECT * FROM products WHERE product_id='".$row['product_id']."'");
          $erow=mysqli_fetch_array($view);
        ?>
        <div class="container">
         <img src="proimg/<?= $row['product_image'];?>" alt="<?php echo $erow['product_title']; ?>" class="img-thumbnail">
         <h5><?php echo $erow['product_title']; ?></h5>
         <h5>$<?php echo $erow['product_price']; ?></h5>
         <p><?php echo $erow['product_desc']; ?></p>
        </div>
        
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>