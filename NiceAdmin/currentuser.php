<?php
include("header.php");
include("connection.php");
?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Table</h5>

              <!-- User Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($con, "SELECT * FROM users");
                  if (mysqli_num_rows($query) > 0) {
                      while ($row = mysqli_fetch_assoc($query)) {
                          echo "<tr>";
                          echo "<th scope='row'>" . $row['id'] . "</th>";
                          echo "<td>" . $row['name'] . "</td>";
                          echo "<td>" . $row['email'] . "</td>";
                          echo "<td>" . $row['role'] . "</td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='4'>No users found</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
              <!-- End User Table Example -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php
include("footer.php");
?>

<?php
if (isset($_POST['signup'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = mysqli_query($con, "INSERT INTO `users`(`id`, `name`, `email`, `password`, `role`) VALUES ('', '$name', '$email', '$password', 'User')");
    
    if ($query) {
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'User registered successfully',
            showConfirmButton: false,
            timer: 1500
        })</script>";
        
        echo "<script>location.assign('login.php')</script>";
    }
}
?>

<?php
// Close the database connection
mysqli_close($con);
?>
