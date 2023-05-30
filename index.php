<?php
session_start();
include('admin/vendor/inc/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("vendor/inc/head.php"); ?>
  <style>
    .carousel-indicators {
      bottom: -25px;
    }

    .carousel-indicators li {
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.5);
      border: none;
      margin: 0 5px;
    }

    .carousel-indicators .active {
      background-color: #fff;
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <?php include("vendor/inc/nav.php"); ?>

  <!-- Header -->
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url('vendor/img/banner.png'); height: 650px;"></div>
        <div class="carousel-item" style="background-image: url('vendor/img/banner2.jpg'); height: 650px;"></div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4 text-center mt-5" style="font-family:fantasy">Welcome to Car Rental System</h1>

    <!-- Features Section -->
    <div class="row mt-5">
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header text-center">Why Choose Us</h4>
          <div class="card-body">
            <p class="card-text">We have a team of highly skilled and professional drivers, ready to serve you with excellence.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header text-center">Core Values</h4>
          <div class="card-body">
            <p class="card-text">We believe in simplicity, trust, and providing the best customer experience.</p>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <!-- Portfolio Section -->
    <h2 class="text-center mt-5 mb-3">Most Hired Vehicles</h2>
    <hr>
    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="gallery.php"><img class="card-img-top" src="vendor/img/vios.jpg" alt=""></a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="gallery.php"><img class="card-img-top" style="height: 218px;" src="vendor/img/subaru.jpg" alt=""></a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="gallery.php"><img class="card-img-top" style="height: 218px;" src="vendor/img/toyota.jpg" alt=""></a>
        </div>
      </div>
    </div>

    <hr>

    <!-- Testimonials Section -->
    <h1 class="my-4 text-center mt-5 mb-3">Client Testimonials</h1>
    <div class="row">
      <?php
      $ret = "SELECT * FROM tms_feedback WHERE f_status = 'Published' ORDER BY RAND() LIMIT 3";
      $stmt = $mysqli->prepare($ret);
      $stmt->execute();
      $res = $stmt->get_result();
      while ($row = $res->fetch_object()) {
      ?>
        <div class="col-lg-6 mb-4">
          <div class="card h-100">
            <h4 class="card-header text-center"><?php echo $row->f_uname; ?></h4>
            <div class="card-body">
              <p class="card-text"><?php echo $row->f_content; ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include("vendor/inc/footer.php"); ?>
  <!-- /.Footer -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>