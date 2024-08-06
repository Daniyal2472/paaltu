<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the doctor from the database
    $query = "DELETE FROM doctors WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Doctor deleted successfully',
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
                    title: 'Error deleting doctor',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'doctors_table.php';
                });
              </script>";
    }
} else {
    header("Location: doctors_table.php");
}
?>
