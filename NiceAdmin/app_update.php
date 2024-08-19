<?php
include("header.php");


$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to update an appointment (only admins can perform this action)
if (!authorize('update_appointment', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update appointments. Only admins can perform this action.</div></div>';
    exit;
}

$appointment = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validate the ID to ensure it's an integer
    if (filter_var($id, FILTER_VALIDATE_INT) === false) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Invalid appointment ID',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'appointments_table.php';
                });
              </script>";
        exit;
    }

    // Fetch appointment details from the database
    $stmt = $con->prepare("SELECT * FROM appointments WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $appointment = $result->fetch_assoc();
    $stmt->close();
}

if (isset($_POST['update_app'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $client = $_POST['client'];
    $doctor = $_POST['doctor'];

    // Validate inputs
    if (empty($date) || empty($time) || empty($client) || empty($doctor)) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'All fields are required',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'appointments_table.php';
                });
              </script>";
        exit;
    }

    // Update the appointment
    $stmt = $con->prepare("UPDATE appointments SET date = ?, time = ?, client = ?, doctor = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $date, $time, $client, $doctor, $id);

    if ($stmt->execute()) {
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

    $stmt->close();
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
                            <input type="date" class="form-control form-control-lg" name="date" id="date" value="<?php echo htmlspecialchars($appointment['date']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control form-control-lg" name="time" id="time" value="<?php echo htmlspecialchars($appointment['time']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Client</label>
                            <input type="text" class="form-control form-control-lg" name="client" id="client" value="<?php echo htmlspecialchars($appointment['client']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="doctor" class="form-label">Doctor</label>
                            <input type="text" class="form-control form-control-lg" name="doctor" id="doctor" value="<?php echo htmlspecialchars($appointment['doctor']); ?>" required>
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
