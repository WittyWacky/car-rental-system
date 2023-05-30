<!--Server Side Scripting To inject Login-->
<?php
//session_start();
include('vendor/inc/config.php');
if (isset($_POST['add_user'])) {
  $u_fname = $_POST['u_fname'];
  $u_lname = $_POST['u_lname'];
  $u_phone = $_POST['u_phone'];
  $u_addr = $_POST['u_addr'];
  $u_email = $_POST['u_email'];
  $u_pwd = md5($_POST['u_pwd']);
  $u_category = $_POST['u_category'];
  $query = "insert into tms_user (u_fname, u_lname, u_phone, u_addr, u_category, u_email, u_pwd) values(?,?,?,?,?,?,?)";
  $stmt = $mysqli->prepare($query);
  $rc = $stmt->bind_param('sssssss', $u_fname,  $u_lname, $u_phone, $u_addr, $u_category, $u_email, $u_pwd);
  $stmt->execute();
  if ($stmt->affected_rows > 0) {
    $succ = 'Account created. Proceeding to log in...';
    echo '<script>alert("' . $succ . '"); window.location.href = "index.php";</script>';
  } else {
    $err = 'Please try again later.';
    echo '<script>alert("' . $err . '");</script>';
  }
}
?>
<!--End Server Side Scriptiong-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Car Rental System">
  <meta name="author" content="Mark Zara">

  <title>Car Rental System</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <?php if (isset($succ)) { ?>
    <!--This code for injecting an alert-->
    <script>
      setTimeout(function() {
          swal("Success!", "<?php echo $succ; ?>!", "success");
        },
        100);
    </script>

  <?php } ?>
  <?php if (isset($err)) { ?>
    <!--This code for injecting an alert-->
    <script>
      setTimeout(function() {
          swal("Failed!", "<?php echo $err; ?>!", "Failed");
        },
        100);
    </script>

  <?php } ?>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Create An Account With Us</div>
      <div class="card-body">
        <!--Start Form-->
        <form method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" required class="form-control" id="exampleInputEmail1" name="u_fname" required>
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" class="form-control" id="exampleInputEmail1" name="u_lname" required>
                  <label for="lastName">Last name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" class="form-control" id="exampleInputEmail1" name="u_phone" required oninput="validatePhoneNumber(this)">
                  <label for="lastName">Contact</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" class="form-control" id="exampleInputEmail1" name="u_addr" required oninput="convertToUppercase(this)">
              <label for="inputEmail">Address</label>
            </div>
          </div>
          <div class="form-group" style="display:none">
            <div class="form-label-group">
              <input type="text" class="form-control" id="exampleInputEmail1" value="User" name="u_category" required>
              <label for="inputEmail">User Category</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" class="form-control" name="u_email" required>
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="password" class="form-control" name="u_pwd" id="password" oninput="checkPasswordStrength()" required>
                  <label for="inputPassword">Password</label>
                </div>
                <div id="password-strength-meter">
                  <div class="bar"></div>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" name="add_user" class="btn btn-success">Create Account</button>
        </form>

        <!--End Form-->
        <div class="text-center">
          <a class="d-block small mt-3" style="font-weight: bold" href="index.php">Login Page</a>
          <a class="d-block small" style="font-weight: bold" href="usr-forgot-pwd.php">Forgot Password?</a>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    function validatePhoneNumber(input) {
      input.value = input.value.replace(/\D/g, '').slice(0, 11);
    }

    function convertToUppercase(input) {
      input.value = input.value.toUpperCase();
    }

    function checkPasswordStrength() {
      var password = document.getElementById('password').value;
      var meter = document.getElementById('password-strength-meter');
      var strength = 0;
      var colors = ['red', 'yellow', 'green'];

      if (password.length >= 8) {
        strength += 1;
      }

      if (password.match(/[a-z]+/)) {
        strength += 1;
      }

      if (password.match(/[A-Z]+/)) {
        strength += 1;
      }

      if (password.match(/[0-9]+/)) {
        strength += 1;
      }

      if (password.match(/[$@#&!]+/)) {
        strength += 1;
      }

      meter.className = 'progress';

      if (strength === 0) {
        meter.innerHTML = '';
      } else {
        var bar = '<div class="bar" style="width: ' + (strength * 20) + '%; background-color: ' + colors[strength - 1] + ';"></div>';
        meter.innerHTML = bar;
      }
    }
  </script>

</body>

</html>