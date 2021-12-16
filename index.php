<?php include'include/header.php';
include"include/navber.php";?>
<div class="container-fluid" style="margin-top: 80px;">
<?php include("include/slide.php");?>
</div>
  <!-- Page Content -->
  <div class="container" style="margin-top: 80px;">

    <div class="row">

      <div class="col-lg-3">
        <!------Categories----->
<h1 class="my-4 btn btn-info">Categories</h1>
        <div class="list-group catselect">
          <?php category(); ?>
        <!------Brand---->
        </div>
        <h1 class="my-4 btn btn-info">Brand</h1>
        <div class="list-group catselect">
          <?php brand(); ?>
        <!---------->
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div class="row">

          <?php product();
           getcat();
           getbrand();?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
 <?php include"include/footer.php";?>