<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the accessory from the database
    $query = "DELETE FROM accessories WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                alert('Accessory deleted successfully!');
                window.location.href = 'acclist.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting accessory.');
                window.location.href = 'acclist.php';
              </script>";
    }
} else {
    header("Location: accessories_table.php");
}
?>
