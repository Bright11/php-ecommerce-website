<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><!--Modal title--></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="container mt-3  text-center">
<h1 class="login text-center bg-secondary">Register</h1>
      <?php
      include("db/db.php");
//register
$megs='';
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if (empty($name)) {
    $megs='<div style="background:blue;color:white;font-size:20px;">Your name please!..</div>';
  }
  elseif (empty($username)) {
     $megs='<div style="background:blue;color:white;font-size:20px;">Your user name please!..</div>';
  }
  elseif (empty($email)) {
     $megs='<div style="background:blue;color:white;font-size:20px;">Your email please!..</div>';
  }
  elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
     $megs='<div style="background:blue;color:white;font-size:20px;">Your email is not valid please!..</div>';
  }
  elseif (empty($password)) {
     $megs='<div style="background:blue;color:white;font-size:20px;">Your password please!..</div>';
  }
  elseif (strlen($password)<5) {
     $megs='<div style="background:blue;color:white;font-size:20px;">Your password must contain at least 5 characters please!..</div>';
  }
  elseif (empty($cpassword)) {
     $megs='<div style="background:blue;color:white;font-size:20px;">Confirm your password please!..</div>';
  }
  elseif ($password != $cpassword) {
     $megs='<div style="background:blue;color:white;font-size:20px;">Your password dose not match please!..</div>';
  }
  else{
    $sql ="SELECT * FROM register WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;
    $stmt->close();
    if ($count>0) {
      $megs='<div style="background:blue;color:white;font-size:20px;">This email already exit please!..</div>';
    }else{
       $sql ="SELECT * FROM register WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;
    $stmt->close();
    if ($count>0) {
      $megs='<div style="background:blue;color:white;font-size:20px;">This user name already exit please!..</div>';
    }
    else{
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sql="INSERT INTO register(name,username,email,password)VALUES(?,?,?,?)";
      $stmt= $conn->prepare($sql);
      $stmt->bind_param('ssss',$name,$username,$email,$password);
      if ($stmt->execute()) {
       $megs='<div style="background:blue;color:white;font-size:20px;">Registration was successful!..</div>';
      // header("Location:index.php");
      }else{
         $megs='<div style="background:blue;color:white;font-size:20px;">An error occur during registration please try again!..</div>';
         //header("Location:cart.php");
      }
    }
    }
  }
}
?>

 <?php echo $megs;?>
<!----the end of php --->
 <form method="post" action="">
        <label>Full Name</label>
        <input class="form-control" type="text" name="name">
         <label>User Name</label>
        <input class="form-control" type="text" name="username">
         <label>Email</label>
        <input class="form-control" type="text" name="email">
         <label>Password</label>
        <input class="form-control" type="password" name="password">
         <label>Confirm Password</label>
        <input class="form-control" type="password" name="cpassword">

        <input class="form-control bg-success mt-3" type="submit" name="register"value="Register" style="text-decoration: none;color: black;font-size: 20px;">
       </form>
       </div>
<!---the end of container--->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>