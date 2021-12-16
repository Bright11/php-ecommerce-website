
<h2 align="center">Orders table</h2>
    <table class="table table-bordered table-dark">         
 
    <thead>
      <tr>
         <th scope="col">Id</th>
         <th scope="col">name</th>
         <th scope="col">Email</th>
         <th scope="col">Product</th>
         <th scope="col">Price</th>
         <th scope="col">Country</th>
         <th scope="col">Location</th>
         <th scope="col">Number</th>
         <th scope="col">Invoice</th>
         <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
      
<?php
$sql="SELECT * FROM customers_order";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($row=$run->fetch_assoc()) {
?>
<tr>
       <th scope="row"><?php echo $row['customer_id'];?></td>
        <td><?php echo $row['customer_name'];?></td>
        <td><?php echo $row['customer_email'];?></td>
        <td><?php echo $row['product'];?></td>
        <td><?php echo $row['price'];?></td>
        <td><?php echo $row['customer_city'];?></td>
        <td><?php echo $row['location'];?></td>
        <td><?php echo $row['customer_contact'];?></td>
        
        <td><?php echo $row['invoice'];?></td>
        <td><?php echo $row['date'];?></td>
      </tr>
<?php
  }
}else{
  ?>
  <h3>No Brand were found</h3>
<?php
}

?>
       
     
    </tbody>
  </table>