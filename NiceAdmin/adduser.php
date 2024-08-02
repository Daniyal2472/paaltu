<?php
include("header.php");
include("connection.php");
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
          <form method="post" action="">
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
</body>

</html>

<?php

if (isset($_POST['signup'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Add user to the database
    $query = mysqli_query($con, "INSERT INTO `users`(`id`, `name`, `email`, `password`, `role`) VALUES ('', '$name', '$email', '$password', 'User')");

    if ($query == 1) {
        $message = "User registered successfully";
    } else {
        $message = "Error in registration";
    }

    // Reload the page to display updated users list
    echo "<script>location.assign('adduser.php')</script>";
}
?>
