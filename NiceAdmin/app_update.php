<?php
include("header.php");
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch appointment details from the database
    $query = "SELECT * FROM appointments WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $appointment = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_app'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $client = $_POST['client'];
    $doctor = $_POST['doctor'];

    $query = "UPDATE appointments SET date='$date', time='$time', client='$client', doctor='$doctor' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Appointment updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'appointments_table.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error updating appointment',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'appointments_table.php';
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
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">Appointment</span></h2>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control form-control-lg" name="date" id="date" value="<?php echo $appointment['date']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control form-control-lg" name="time" id="time" value="<?php echo $appointment['time']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Client</label>
                            <input type="text" class="form-control form-control-lg" name="client" id="client" value="<?php echo $appointment['client']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="doctor" class="form-label">Doctor</label>
                            <input type="text" class="form-control form-control-lg" name="doctor" id="doctor" value="<?php echo $appointment['doctor']; ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="update_app" type="submit" class="btn btn-dark btn-lg rounded-1" value="Update Appointment">
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
