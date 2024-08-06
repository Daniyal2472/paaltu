<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the pet from the database
    $query = "DELETE FROM pets WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                alert('Pet deleted successfully');
                window.location.href = 'pets_table.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting pet');
                window.location.href = 'pets_table.php';
              </script>";
    }
}
?>
