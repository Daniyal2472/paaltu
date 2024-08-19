<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to delete an accessory (only admins can delete accessories)
if (!authorize('delete_accessory', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to delete this accessory. Only admins can perform this action.</div></div>';
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to delete the accessory
    $stmt = $con->prepare("DELETE FROM accessories WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo '<script>
        Swal.fire({
            title: "Good job!",
            text: "Accessory deleted successfully!",
            icon: "success"
        });
        </script>';
        header("Location: acclist.php");
    } else {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">Failed to delete the accessory.</div></div>';
    }

    // Close the statement
    $stmt->close();
}
?>
