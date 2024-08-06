<?php
include("header.php");
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch doctor details from the database
    $query = "SELECT * FROM doctors WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $doctor = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_doctor'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $qualification = $_POST['qualification'];

    $query = "UPDATE doctors SET name='$name', email='$email', qualification='$qualification' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Doctor updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'doctors_table.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error updating doctor',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'doctors_table.php';
                });
              </script>";
    }
}
?>

<body>
    <section id="update" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5">
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">Doctor</span></h2>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo $doctor['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="email" value="<?php echo $doctor['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control form-control-lg" name="qualification" id="qualification" value="<?php echo $doctor['qualification']; ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="update_doctor" type="submit" class="btn btn-dark btn-lg rounded-1" value="Update Doctor">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<?php
include("footer.php");
?>
