<?php
include("db/db.php");
if (isset($_POST['submit'])) {
$brand_title =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['brand_title']), ENT_QUOTES, 'UTF-8');
if (empty($brand_title)) {
echo $message='<div class="error btn btn-danger">Brand is empty</div>';
}else{
$result=$conn->query("SELECT * FROM brands WHERE brand_title='".$brand_title."'");
		$rows=$result->num_rows;
		if ($rows>0) {
			echo $message4='<div class="error btn-danger">Brand name already exist.</div>';
		
}else{

$stmt = $conn->prepare("INSERT INTO brands (brand_title)VALUES(?) ");
$stmt->bind_param("s", $brand_title);
$stmt->execute();
 echo '<div id="result btn-danger">category inserted successfully!</div>';
	 $stmt->close();
    $conn->close();
    header("Location:index.php?addbrand");
}
}

}

?>
<form method="post">
<div class="form-group">
<label>Brand name</label><br>
<input class="form-control" type="name" name="brand_title">
</div>
<div class="form-group">
<input class="form-control" type="submit" name="submit" id="submit"  style="background: green; font-size: 20px; color: white;">
</div>
</form>


<h2 align="center">Brand table</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>name</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
<?php
$sql="SELECT * FROM brands";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($row=$run->fetch_assoc()) {
?>
<tr>
       <td><?php echo $row['brand_id'];?></td>
        <td><?php echo $row['brand_title'];?></td>
         <td class="bg-success" align="center"><a href="index.php?upbrand=<?php echo $row['brand_id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="index.php?delebrand=<?php echo $row['brand_id'];?>" style="text-decoration: none;color: white;">Delete</a></td>
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