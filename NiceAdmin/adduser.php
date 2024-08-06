<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>paalto</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <section id="register" style="background: url('images/background-img.png') no-repeat;">
    <div class="container">
      <div class="row my-5 py-5 mt-0 mb-0">
        <div class="offset-md-3 col-md-6 my-5">
          <h2 class="display-3 fw-normal text-center">PALTO <br> <span class="text-primary">Add user</span></h2>
          <form method="post" action="" onsubmit="return validateForm()">
            <div class="mb-3">
              <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Enter Your Full Name">
            </div>
            <div class="mb-3">
              <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter Your Email Address">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control form-control-lg" id="password1" placeholder="Create Password">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control form-control-lg" name="password" id="password2" placeholder="Repeat Password">
            </div>

            <div class="d-grid gap-2">
              <input name="signup" type="submit" class="btn btn-dark btn-lg rounded-1" value="Add user">
            </div>
          </form>

          <!-- Display success message -->
          <?php if (isset($message)) { echo "<div class='alert alert-success'>$message</div>"; } ?>
          
          <!-- Display users table -->
          
        </div>
      </div>
    </div>
  </section>

  <script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password1 = document.getElementById("password1").value;
        var password2 = document.getElementById("password2").value;

        if (username == "" || email == "" || password1 == "" || password2 == "") {
            alert("All fields must be filled out");
            return false;
        }

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address");
            return false;
        }

        if (password1 !== password2) {
            alert("Passwords do not match");
            return false;
        }

        if (password1.length < 6) {
            alert("Password must be at least 6 characters long");
            return false;
        }

        return true;
    }
  </script>

</body>

</html>

<?php

if (isset($_POST['signup'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Add user to the database
    $query = mysqli_query($con, "INSERT INTO users(id, name, email, password, role) VALUES ('', '$name', '$email', '$password', 'User')");

    if ($query == 1) {
      session_start();
      $_SESSION['status'] = "User registered successfully!";
      if(isset($_SESSION['status'])){?>
        <script>
          swal({
          title: "<?php echo $_SESSION['status']; ?>",
          icon: "success",
          button: "Okay",
        });
        </script>
          
          <?php
          unset($_SESSION['status']);
          }
    } else {
        $message = "Error in registration";
    }
}
?>