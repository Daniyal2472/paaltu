<?php
include("connection.php");

?>
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
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="css/vendor.css">
<link rel="stylesheet" type="text/css" href="../waGGy-1.0.0/style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Montserrat:wght@300;400;500&display=swap"
  rel="stylesheet">

</head>
<body>
    <section id="register" style="background: url('images/background-img.png') no-repeat;">
        <div class="container ">
          <div class="row my-5 py-5 mt-0 mb-0">
            <div class="offset-md-3 col-md-6 my-5 ">
              <h2 class="display-3 fw-normal text-center">PALTO <br> <span class="text-primary">Register FORM</span>
              </h2>
              <form method="post" action="">
              <div class="mb-3">
                  <input type="text" class="form-control form-control-lg" name="username" id="email"
                    placeholder="Enter Your Full Name">
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control form-control-lg" name="email" id="email"
                    placeholder="Enter Your Email Address">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control form-control-lg" id="password1"
                    placeholder="Create Password">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control form-control-lg" name="password" id="password2"
                    placeholder="Repeat Password">
                </div>
    
                <div class="d-grid gap-2">
                <input name="signup" type="submit" class="btn btn-dark btn-lg rounded-1" value="Sign Up">
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </section>
</body>

<?php
if (isset($_POST['signup'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = mysqli_query($con, "INSERT INTO `users`(`id`, `name`, `email`, `password`, `role`) VALUES ('','$name','$email','$password','User')");
    
    if ($query == 1) {
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'user registered successfully',
            showConfirmButton: false,
            timer: 1500
        })</script>";
        
        echo "<script>location.assign('login.php')</script>";
    }
}
?>



