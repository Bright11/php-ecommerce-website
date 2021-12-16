<?php
include("db/db.php");
if (isset($_POST['submit'])) {
$cat_title =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['cat_title']), ENT_QUOTES, 'UTF-8');
if (empty($cat_title)) {
echo $message='<div class="error btn btn-danger">Category is empty</div>';
}else{
$result=$conn->query("SELECT * FROM categories WHERE cat_title='".$cat_title."'");
		$rows=$result->num_rows;
		if ($rows>0) {
			echo $message4='<div class="error btn-danger">Category name already exist.</div>';
		
}else{

$stmt = $conn->prepare("INSERT INTO categories (cat_title)VALUES(?) ");
$stmt->bind_param("s", $cat_title);
$stmt->execute();
 echo '<div id="result btn-danger">category inserted successfully!</div>';
	 $stmt->close();
    $conn->close();
    header("Location:index.php?addcat");
}
}

}

?>
<form method="post">
<div class="form-group">
<label>Category name</label><br>
<input class="form-control" type="name" name="cat_title">
</div>
<div class="form-group">
<input class="form-control" type="submit" name="submit" id="submit"  style="background: green; font-size: 20px; color: white;">
</div>
</form>

<h2 align="center">Category table</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Category Id</th>
        <th>Category name</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
<?php
$sql="SELECT * FROM categories";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($row=$run->fetch_assoc()) {
?>
<tr>
       <td><?php echo $row['cat_id'];?></td>
        <td><?php echo $row['cat_title'];?></td>
         <td class="bg-success" align="center"><a href="index.php?updatecat=<?php echo $row['cat_id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="index.php?cat=<?php echo $row['cat_id'];?>" style="text-decoration: none;color: white;">Delete</a></td>
      </tr>
<?php
  }
}else{
  ?>
  <h3>No category were found</h3>
<?php
}

?>
       
     
    </tbody>
  </table>