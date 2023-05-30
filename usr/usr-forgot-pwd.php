<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-box {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body class="bg-dark">
    <div class="center-container">
        <div class="form-box">
            <h2 class="text-center">Forgot Password</h2>
            <?php
            include('vendor/inc/config.php');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get the submitted email
                $u_email = $_POST['u_email'];

                // Generate a new password
                $newPassword = generateNewPassword(); // You can replace this with your own logic to generate a new password

                // Update the password in the database
                $dbuser = "root";
                $dbpass = "";
                $host = "localhost";
                $db = "vehiclebookings";

                // Connect to the database
                $conn = new mysqli($host, $dbuser, $dbpass, $db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Update the password for the given email
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $sql = "UPDATE tms_user SET u_pwd = '$hashedPassword' WHERE u_email = '$u_email'";
                if ($conn->query($sql) === TRUE) {
                    $success_message = 'Password updated successfully. Your new password is: ' . $newPassword;
                    // Hide the form after password update
                    echo '<script>document.getElementById("passwordForm").style.display = "none";</script>';
                } else {
                    $error_message = 'Error updating password: ' . $conn->error;
                }

                // Close the database connection
                $conn->close();

                // Display success or error message
                if (isset($success_message)) {
                    echo '<div class="alert alert-success">' . $success_message . '</div>';
                } elseif (isset($error_message)) {
                    echo '<div class="alert alert-danger">' . $error_message . '</div>';
                }
            }

            function generateNewPassword()
            {
                // Implement your own logic to generate a new password
                // This is just a simple example that generates a random 8-character password
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $newPassword = '';
                for ($i = 0; $i < 8; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $newPassword .= $characters[$index];
                }
                return $newPassword;
            }
            ?>
            <form method="POST" id="passwordForm">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="u_email" placeholder="Enter your email" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
                <a href="index.php" class="btn btn-link btn-block">Login</a>
            </form>
            <div id="successMessage" style="display: none;">
                <?php
                if (isset($success_message)) {
                    echo '<div class="alert alert-success">' . $success_message . '</div>';
                    echo '<a href="index.php" class="btn btn-link btn-block">Login</a>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>