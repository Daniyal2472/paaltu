<?php
// session_start();
include("../connection.php");

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}else{
    $username='Guest';}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Paaltuu Admin panel</title>
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

  
</head>

<body>
<?php 
if ($role=="Admin") {
?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Paaltuu</span>
      </a>
   
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

       


      <div class="dropdown">
    <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="iconify w-50" data-icon="healthicons:person"></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" aria-labelledby="userDropdown">
        
          <?php
        if (isset($_SESSION['user_id'])) {
          ?>
          <li class="dropdown-header"></li>
            <h6><?php echo $name;?></h6></li>
            <span><?php echo $role;?></span> <!-- You can replace this with another role or description if needed -->
            <?php
} ?>
            
        
        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <?php
if (isset($_SESSION['user_id'])) {
?>
    <li>
        <a class="dropdown-item d-flex align-items-center" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
        </a>
    </li>
<?php
} else {
?>
    <li>
        <a class="dropdown-item d-flex align-items-center" href="../login.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Login</span>
        </a>
    </li>
<?php
}
?>


      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    
    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <!-- Users Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Users :</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="adduser.php">
        <i class="bi bi-card-list"></i>
        <span>Add User</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="currentuser.php">
        <i class="bi bi-file-earmark"></i>
        <span>User List</span>
      </a>
    </li>

    <!-- Doctors Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Doctors:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="adddoc.php">
        <i class="bi bi-card-list"></i>
        <span>Add Doctor</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="doclist.php">
        <i class="bi bi-file-earmark"></i>
        <span>Doctor List</span>
      </a>
    </li>

    <!-- Appointments Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Appointments:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="applist.php">
        <i class="bi bi-file-earmark"></i>
        <span>Appointment List</span>
      </a>
    </li>

    <!-- Categories Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Categories:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addcat.php">
        <i class="bi bi-card-list"></i>
        <span>Add Category</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="catlist.php">
        <i class="bi bi-file-earmark"></i>
        <span>Category List</span>
      </a>
    </li>

    <!-- Pets Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Pets:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addpet.php">
        <i class="bi bi-card-list"></i>
        <span>Add Pet</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="petlist.php">
        <i class="bi bi-file-earmark"></i>
        <span>Pet List</span>
      </a>
    </li>

    <!-- Accessories Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Accessories:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addacc.php">
        <i class="bi bi-card-list"></i>
        <span>Add Accessory</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="acclist.php">
        <i class="bi bi-file-earmark"></i>
        <span>Accessory List</span>
      </a>
    </li>

    <!-- Food Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Food:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addfood.php">
        <i class="bi bi-card-list"></i>
        <span>Add Food</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="foodlist.php">
        <i class="bi bi-file-earmark"></i>
        <span>Food List</span>
      </a>
    </li>

    <!-- Sellers Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Sellers:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="sellerlist.php">
        <i class="bi bi-file-earmark"></i>
        <span>Seller List</span>
      </a>
    </li>
    <li class="nav-item">
      <h5 class="sidebar-heading">contact:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contactlist.php">
        <i class="bi bi-file-earmark"></i>
        <span>contact List</span>
      </a>
    </li>

  </ul>
</aside>
<?php
}
?>
  <!-- End Sidebar -->


  <?php 
if ($role=="User") {
?>
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    
    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <!-- Users Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Users :</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="adduser.php">
        <i class="bi bi-card-list"></i>
        <span>Add User</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="currentuser.php">
        <i class="bi bi-file-earmark"></i>
        <span>User List</span>
      </a>
    </li>
  </ul>
</aside>
<?php
}
?>
  <!-- Scripts -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- End Sidebar-->