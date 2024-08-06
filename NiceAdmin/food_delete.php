<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the food from the database
    $query = "DELETE FROM foods WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                alert('Food deleted successfully');
                window.location.href = 'foods_table.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting food');
                window.location.href = 'foods_table.php';
              </script>";
    }
}
?>
