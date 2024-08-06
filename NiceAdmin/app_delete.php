<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the appointment from the database
    $query = "DELETE FROM appointments WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Appointment deleted successfully',
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
                    title: 'Error deleting appointment',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'appointments_table.php';
                });
              </script>";
    }
} else {
    header("Location: appointments_table.php");
}
?>
