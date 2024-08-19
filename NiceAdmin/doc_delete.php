<?php
include("header.php");

// Example user data
$user = ['role' => $_SESSION['role']];

// Check if the user is allowed to delete a doctor (only admins can delete doctors)
if (!authorize('delete_doctors', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to delete this doctor. Only admins can perform this action.</div></div>';
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id']; // Sanitize ID

    // Prepare the statement to avoid SQL injection
    $deleteDoctorStmt = $con->prepare("DELETE FROM doctors WHERE id = ?");
    $deleteDoctorStmt->bind_param('i', $id);

    try {
        $result = $deleteDoctorStmt->execute();

        if ($result) {
            // Output the SweetAlert script
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                    Swal.fire({
                        title: "Good job!",
                        text: "Doctor deleted successfully!",
                        icon: "success"
                    }).then(function() {
                        window.location.href = "doclist.php";
                    });
                  </script>';
        } else {
            throw new Exception('Error deleting doctor');
        }
    } catch (Exception $e) {
        // Output the SweetAlert error script
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Failed to delete doctor: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '",
                    icon: "error"
                }).then(function() {
                    window.location.href = "doclist.php";
                });
              </script>';
    } finally {
        // Close the prepared statement
        $deleteDoctorStmt->close();
        // Close the database connection
       
    }
} else {
    header("Location: doctors_table.php");
    exit(); // Always use exit() after header redirection to stop script execution
}
?>
