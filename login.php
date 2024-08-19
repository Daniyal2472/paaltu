<?php include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Waggy - Free eCommerce Pet Shop HTML Website Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/vendor.css">
  <link rel="stylesheet" type="text/css" href="waGGy-1.0.0/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <section id="register" style="background: url('waGGy-1.0.0/images/background-img.png') no-repeat;">
        <div class="container">
          <div class="row my-5 py-5 mt-0 mb-0">
            <div class="offset-md-3 col-md-6 my-5 text-center">
    <div class="text-center">
    <div class="main-logo">
        <a href="index.php">
            <img src="waGGy-1.0.0/images/paltoo.png" alt="logo" class="img-fluid logo-img" style="height: 100px; width: auto;">
        </a>
    </div>
</div>

              <h2 class="display-3 fw-normal text-center mt-4"> 
              <span class="text-primary">LOGIN FORM</span></h2>
              <form method="post" action="" onsubmit="return validateForm()">
                <div class="mb-3">
                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter Your Email Address">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control form-control-lg" name="password" id="password1" placeholder="Enter Password">
                </div>
                <div class="d-grid gap-2">
                  <input name="signin" type="submit" class="btn btn-dark btn-lg rounded-1" value="Sign In">
                </div>
                <div class="mb-3 pt-4">
                  <p class="text-center">Don't have an account? <a href="waGGy-1.0.0/register.php" class="btn btn-link">Create Your Account</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
    </section>

    <script>
      function validateForm() {
        var email = document.getElementById("email").value;
        var password1 = document.getElementById("password1").value;

        if (email == "" || password1 == "") {
          alert("All fields must be filled out");
          return false;
        }

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
          alert("Invalid email format");
          return false;
        }

        return true;
      }
    </script>

</body>

<?php
if (isset($_POST['signin'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Server-side validation
    if (empty($email) || empty($password)) {
        echo "<script>alert('All fields are required');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
    } else {
        $query = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email'");
        $row = mysqli_fetch_assoc($query);

        if ($row && password_verify($password, $row['password'])) {
            echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Login successful',
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(function() {
                    location.assign('dashboard.php');
                }, 1500);
            </script>";
        } else {
            echo "<script>alert('Invalid email or password');</script>";
        }
    }
}
?>
</html>
