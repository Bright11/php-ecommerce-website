<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Bright C Web Developer</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
           <?php if (isset($_SESSION['username'])) {
            ?>
            <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fas fa-unlock-alt"></i>&nbsp;Logout</a>
          </li>
          <?php
          } else{
            ?>
             <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#register"><i class="fas fa-lock"></i>&nbsp;Register
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#login"><i class="fas fa-unlock-alt"></i>&nbsp;Login
            </a>
          </li>
          <?php
          }
          ?>
        <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class='fas fa-cart-plus'></i><span id="getdata" class="badge badge-danger"><?php echo $count;?></span></a>
        </li>
      
        </ul>
      </div>
    </div>
  </nav>
  <?php include("register.php"); include("login.php");?>