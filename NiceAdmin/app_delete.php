<?php
include("header.php");

$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to delete an appointment (only admins can perform this action)
if (!authorize('delete_appointment', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to delete appointments. Only admins can perform this action.</div></div>';
    exit;
}

// Check if 'id' is present in the query string
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

    // Database connection
    $con = mysqli_connect("localhost", "username", "password", "database");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Database connection failed',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'appointments_table.php';
                });
              </script>";
        exit;
    }

    // Prepare and execute the delete query
    $stmt = $con->prepare("DELETE FROM appointments WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Appointment deleted successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'applist.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error deleting appointment',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'appointments_table.php';
                });
              </script>";
    }

    $stmt->close();
} else {
    header("Location: appointments_table.php");
    exit;
}
?>
