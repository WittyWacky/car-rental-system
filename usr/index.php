<!--Server Side Scripting Language to inject login code-->
<?php
    session_start();
    include('vendor/inc/config.php'); //get configuration file
    
    if(isset($_POST['Usr-login'])) {
      $u_email = $_POST['u_email'];
      $u_pwd = md5($_POST['u_pwd']); // hash the password using MD5
      
      $stmt = $mysqli->prepare("SELECT u_email, u_pwd, u_id FROM tms_user WHERE u_email=? and u_pwd=? ");
      $stmt->bind_param('ss', $u_email, $u_pwd);
      $stmt->execute();
      $stmt->bind_result($u_email, $u_pwd, $u_id);
      $rs = $stmt->fetch();
      $_SESSION['u_id'] = $u_id;
      $_SESSION['login'] = $u_email;
  
      if($rs) {
          header("location:user-dashboard.php");
      } else {
          $error = "Access Denied. Please check your credentials.";
      }
  }
?>
<!--End Server Side Script Injection-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Car Rental System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Client Login Panel</div>
      <div class="card-body">
        <!--INJECT SWEET ALERT-->
        <!--Trigger Sweet Alert-->
          <?php if(isset($error)) {?>
          <!--This code for injecting an alert-->
              <script>
                    setTimeout(function () 
                    { 
                      swal("Failed!","<?php echo $error;?>!","error");
                    },
                      100);
              </script>
                  
          <?php } ?>
        <form method ="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="u_email" id="inputEmail" class="form-control"  required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="u_pwd" id="inputPassword" class="form-control"  required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <input type="submit" name="Usr-login" class="btn btn-success btn-block" value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" style="font-weight: bold" href="usr-register.php">Register an Account</a>
          <a class="d-block small" style="font-weight: bold" href="../index.php">Home</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
