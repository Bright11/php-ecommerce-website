<?php
if (isset($_GET['updatecat'])) {
 $cat_id = $_GET['updatecat'];

if (isset($_POST['submit'])) {
$ncat_title =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['ncat_title']), ENT_QUOTES, 'UTF-8');

$sql="UPDATE categories SET cat_title='$ncat_title' WHERE cat_id='$cat_id'";
 if (mysqli_query($conn,$sql)) {
   header("Location:index.php?addcat");
}
}

?>

<?php
$sql="SELECT * FROM categories WHERE cat_id='$cat_id'";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($row=$run->fetch_assoc()) {
?>
<form method="post">
<div class="form-group">
<label>Brand name</label><br>
<input class="form-control" type="name" name="ncat_title" value="<?php echo $row['cat_title'];?>">
</div>
<div class="form-group">
<input class="form-control" type="submit" name="submit" id="submit"  style="background: green; font-size: 20px; color: white;">
</div>
</form>
<?php
}
}
}
?>