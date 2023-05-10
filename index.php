<?php
  session_start();
  include('admin/vendor/inc/config.php');
  //include('vendor/inc/checklogin.php');
  //check_login();
  //$aid=$_SESSION['a_id'];
?>
<!DOCTYPE html>
<html lang="en">
<!--Head-->
<?php include("vendor/inc/head.php");?>

<body>

  <!-- Navigation -->
  <?php include("vendor/inc/nav.php");?>
<!--End Navigation-->

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('vendor/img/banner.png'); height: 650px;">
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('vendor/img/banner2.jpg'); height: 650px;">
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <!-- <div class="carousel-item" style="background-image: url('vendor/img/placeholder.png')">
        </div> -->

        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4 text-center mt-5">Welcome to Car Rental System</h1>

    <!-- Marketing Icons Section -->
    <div class="row mt-5">
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header text-center">Why Us</h4>
          <div class="card-body">
            <p class="card-text"> -> Kasi Magaling na driver si Mark Zara</p>
          </div>
          
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header text-center">Core Values</h4>
          <div class="card-body">
            <p class="card-text">
              -> Simple lang mapapagkatiwalaan si Wacko            
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <hr>
    <!-- Portfolio Section -->
    <h2 class="text-center mt-5 mb-3">Most Hired Vehicles</h2>
    <!--Portfolio Section -->
    <hr>
    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="vendor/img/car1.jpg" alt=""></a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" style="height: 218px;"src="vendor/img/car2.jpg" alt=""></a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" style="height: 218px;" src="vendor/img/car3.jpg" alt=""></a>
        </div>
      </div>
      
    </div>
    <!-- /.row -->


    <hr>
    <h1 class="my-4 text-center mt-5 mb-3">Client Testimonials</h1>

    <div class="row">
    <?php

      $ret="SELECT * FROM tms_feedback where f_status ='Published' ORDER BY RAND() LIMIT 3 "; //get all feedbacks
      $stmt= $mysqli->prepare($ret) ;
      $stmt->execute() ;//ok
      $res=$stmt->get_result();
      $cnt=1;
      while($row=$res->fetch_object())
    {
    ?>
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header text-center"><?php echo $row->f_uname;?></h4>
          <div class="card-body">
            <p class="card-text"><?php echo $row->f_content;?></p>
          </div>
          </div>
      </div>
    <?php }?>
    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
    <?php include("vendor/inc/footer.php");?>
  <!--.Footer-->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
