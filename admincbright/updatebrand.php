<?php
if (isset($_GET['upbrand'])) {
 $brand_id = $_GET['upbrand'];

if (isset($_POST['submit'])) {
$nbrand_title =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['nbrand_title']), ENT_QUOTES, 'UTF-8');

$sql="UPDATE brands SET brand_title='$nbrand_title' WHERE brand_id='$brand_id'";
 if (mysqli_query($conn,$sql)) {
     header("Location:index.php?addbrand");
}
}

?>

<?php
$sql="SELECT * FROM brands WHERE brand_id='$brand_id'";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($row=$run->fetch_assoc()) {
?>
<form method="post">
<div class="form-group">
<label>Brand name</label><br>
<input class="form-control" type="name" name="nbrand_title" value="<?php echo $row['brand_title'];?>">
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