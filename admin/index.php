<!--Server Side Scripting Language to inject login code-->
<?php
    session_start();
    include('vendor/inc/config.php');//get configuration file
    if(isset($_POST['admin_login']))
    {
      $a_email=$_POST['a_email'];
      $a_pwd=md5($_POST['a_pwd']); // hash the password using MD5
      $stmt=$mysqli->prepare("SELECT a_email, a_pwd, a_id FROM tms_admin WHERE a_email=? and a_pwd=? ");
      $stmt->bind_param('ss',$a_email,$a_pwd);
      $stmt->execute();
      $stmt -> bind_result($a_email,$a_pwd,$a_id);
      $rs=$stmt->fetch();
      $_SESSION['a_id']=$a_id;
      
      if($rs)
      {
        header("location:admin-dashboard.php");
      }
      else
      {
        $error = "Access Denied Please Check Your Credentials";
      }
    }
  ?>
<!--End Server side-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Car Rental System">
  <meta name="author" content="Mark Zara">

  <title>Car Rental System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
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

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin | Login</div>
      <div class="card-body">

        <form method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="a_email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name ="a_pwd" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password 
              </label>
            </div>
          </div>
          <input type="submit"  class="btn btn-success btn-block" name="admin_login" value="Login">
        </form>

        <div class="text-center">
        <a class="d-block small mt-3" href="../index.php">Home</a>
          <a class="d-block small" href="admin-reset-pwd.php">Forgot Password?</a>
        </div> 

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--Sweet alerts js-->
  <script src="vendor/js/swal.js"></script>


</body>

</html>
