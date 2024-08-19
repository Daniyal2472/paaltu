<?php

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
  <link href="assets/img/paltoo.png" rel="icon">
  <link href="assets/img/paltoo.png" rel="apple-touch-icon">

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

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">

  
</head>

<body>
<?php 
if ($role=="Admin") {
?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
  <div class="text-center">
    <div class="main-logo">
        <a href="index.php">
            <img src="../NiceAdmin/assets/img/paltoo.png" alt="logo" class="img-fluid logo-img" style="height: 80px; width: auto;">
        </a>
    </div>
</div>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

       


              <a href="../waGGy-1.0.0/index.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 ">
              <i class="bi bi-house-door "></i>   
              BACK TO HOME
              
              </a>


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
        <i class="bi bi-eye"></i>
        <span>View User List</span>
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
        <i class="bi bi-eye"></i>
        <span>View Doctor List</span>
      </a>
    </li>

    <!-- Appointments Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Appointments:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="applist.php">
        <i class="bi bi-eye"></i>
        <span>View Appointment List</span>
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
        <i class="bi bi-eye"></i>
        <span>View Category List</span>
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
        <i class="bi bi-eye"></i>
        <span>View Pet List</span>
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
        <i class="bi bi-eye"></i>
        <span>View Accessory List</span>
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
        <i class="bi bi-eye"></i>
        <span>View Food List</span>
      </a>
    </li>

    <!-- Sellers Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Sellers:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="sellerlist.php">
        <i class="bi bi-eye"></i>
        <span>View Seller List</span>
      </a>
    </li>
    <li class="nav-item">
      <h5 class="sidebar-heading">contact:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contactlist.php">
        <i class="bi bi-eye"></i>
        <span>View contact List</span>
      </a>
    </li>
    <li class="nav-item">
      <h5 class="sidebar-heading">Order List:</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="order_list.php">
        <i class="bi bi-eye"></i>
        <span>View order List</span>
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
 <header id="header" class="header fixed-top d-flex align-items-center">

 <div class="text-center">
    <div class="main-logo">
        <a href="index.php">
            <img src="../NiceAdmin/assets/img/paltoo.png" alt="logo" class="img-fluid logo-img" style="height: 80px; width: auto;">
        </a>
    </div>
</div>

<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    
    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <!-- Users Section -->
    <li class="nav-item">
      <h5 class="sidebar-heading">Users :</h5>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="post_list.php">
        <i class="bi bi-card-list"></i>
        <span>My Posts</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="user_order_list.php">
        <i class="bi bi-card-list"></i>
        <span>My order list</span>
      </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="../waGGy-1.0.0/index.php">
        <i class="bi bi-house-door"></i> <!-- House icon from Bootstrap Icons -->
        <span>Back to Home</span>
    </a>
</li>

  </ul>
</aside>
</header>
<?php
}
?>
<!-- Scripts -->
<!-- Include jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- DataTables Script -->
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>

<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Initialize DataTables -->
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
<!-- End Sidebar-->