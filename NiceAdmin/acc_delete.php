<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the accessory from the database
    $query = "DELETE FROM accessories WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Accessory deleted successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'accessories_table.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error deleting accessory',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'accessories_table.php';
                });
              </script>";
    }
} else {
    header("Location: accessories_table.php");
}
?>
