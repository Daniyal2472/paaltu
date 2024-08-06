<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the pet from the database
    $query = "DELETE FROM pets WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Pet deleted successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'pets_table.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error deleting pet',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'pets_table.php';
                });
              </script>";
    }
} else {
    header("Location: pets_table.php");
}
?>
