<?php include("addaction/actions.php");?> 
<table class="table table-bordered table-dark">
<h4>Products table</h4>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col"> Name</th>
      <th scope="col"> Price</th>
      <th scope="col"> Image</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php $sql="SELECT * FROM products";
    $run=$conn->query($sql);
    if ($run->num_rows>0) {
     while ($row=$run->fetch_assoc()) {
       ?>
    
    <tr>
      <th scope="row"><?php echo $row['product_id'];?></th>
      <td><?php echo $row['product_title'];?></td>
      <td><?php echo $row['product_price'];?></td>
      <td><img style="height: 20vh;" src="../proimg/<?php echo $row['product_image'];?>"></td>
      <td class="" align="center"><a href="index.php?update=<?php echo $row['product_id']; ?>" style="text-decoration: none; color: white;">Update</a></td>
      <td class="" align="center"><a href="index.php?delete=<?php echo $row['product_id'];?>" style="text-decoration: none; color: red;">Delete</a></td>
    </tr>
    <?php
     }
    }
    ?>
  </tbody>
</table>