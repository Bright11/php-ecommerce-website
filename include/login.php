<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><!--Modal title--></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
$error='';
if (isset($_POST['login'])) {
  include("db/db.php");
  $email = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['email']), ENT_QUOTES, 'UTF-8');
  $password = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['password']), ENT_QUOTES, 'UTF-8');
  if (empty($email)) {
  $error='<div class="btn btn-danger">Email is empty!';
  }
 
  elseif (empty($password)) {
    $error='<div class="btn btn-danger">Password is empty!';
    
  }
  else{
    $sql = "SELECT * FROM register WHERE email=? OR username=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      $error='<div class="btn btn-danger">An error occurred! try again';

      
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $email, $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdcheck = password_verify($password, $row['password']);
        if ($pwdcheck == false) {
          
           $error='<div class="btn btn-danger">Wrong password!';
      
        }
        elseif ($pwdcheck == true) {
          //session_start();
          $_SESSION['id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          $error='<div class="btn btn-success">Login successfully !';
         header('location:index.php');
    
        }
        else{
        
          $error='<div class="btn btn-danger">Wrong password!';
      
        }
      }
      else{
        $error='<div class="btn btn-danger">No user found!';
      
      }
    }
  }

}

?>
      <!---php files----->
<div class="container mt-3  text-center">
<h1 class="login text-center bg-secondary">Login</h1>
<h4><?php echo $error;?></h4>
<form class="form text-center" action="" method="post">
<div class="form-group">
<label for="email">Email or User Name</label>
<input type="text" class="form-control" name="email" placeholder="Email" placeholder="Email......">
<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" name="password" placeholder="Password.....">
</div>
<div class="form-group text-center">
<label for="checkbox">Remember me</label><br>
<input type="checkbox" name="">
</div>
<div class="form-group">
<input type="submit" class="form-control bg-success" name="login" style="color: white; font-size: 20px;">
</div>
<div class="form-group text-center">

<a href="reset_password.php" style="text-decoration: none;color: black;font-size: 20px;">Forgot Password</a>
</div>
</div>

</form>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>