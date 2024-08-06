<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the user from the database
    $query = "DELETE FROM users WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'User deleted successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'user_table.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error deleting user',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'user_table.php';
                });
              </script>";
    }
} else {
    header("Location: user_table.php");
}
?>
