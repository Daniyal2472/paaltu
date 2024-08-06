<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the category from the database
    $query = "DELETE FROM categories WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                alert('Accessory deleted successfully!');
                window.location.href = 'catlist.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting accessory.');
                window.location.href = 'catlist.php';
              </script>";
    }
} else {
    header("Location:catlist.php");
}
?>
