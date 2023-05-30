<?php
session_start();
include('admin/vendor/inc/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("vendor/inc/head.php"); ?>
  <style>
    /* New background style */
    body {
      background: url('./vendor/img/bgimage.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    /* Overlay style */
    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: -1;
    }

    /* Centered text style */
    .centered-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-family: fantasy;
      font-size: 36px;
      color: #ffffff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
      z-index: 1;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.5);
      border: 2px solid #ffffff;
    }

    /* Arrow button style */
    .arrow-button {
      position: absolute;
      top: calc(50% + 70px);
      left: 50%;
      transform: translateX(-50%);
      z-index: 1;
      cursor: pointer;
    }

    /* Arrow color */
    .arrow-button svg {
      stroke: #ffffff;
    }

    /* Content container style */
    .content-container {
      margin-top: 100px;
      padding: 20px;
      background-color: #ffffff;
      border: 2px solid #000000;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
      .centered-text {
        font-size: 24px;
      }

      .arrow-button {
        top: calc(50% + 40px);
      }
    }

    @media (max-width: 576px) {
      .centered-text {
        font-size: 18px;
        padding: 10px;
      }

      .arrow-button {
        top: calc(50% + 20px);
      }
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <?php include("vendor/inc/nav.php"); ?>

  <!-- Page Content -->
  <div class="container">
    <div class="centered-text">
      <h1>Welcome to Car Rental System</h1>
    </div>

    <div class="arrow-button">
      <svg width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down-circle" onclick="scrollToContent()">
        <circle cx="12" cy="12" r="10"></circle>
        <polyline points="8 12 12 16 16 12"></polyline>
        <line x1="12" y1="8" x2="12" y2="16"></line>
      </svg>
    </div>
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JavaScript -->
  <script>
    function scrollToContent() {
      const container = document.querySelector('.content-container');
      container.scrollIntoView({
        behavior: 'smooth'
      });
    }
  </script>

</body>

</html>
