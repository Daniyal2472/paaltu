<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to delete an accessory (only admins can delete accessories)
if (!authorize('delete_users', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to delete this accessory. Only admins can perform this action.</div></div>';
    exit;
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validate and sanitize the ID
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Invalid ID provided!",
                    icon: "error"
                }).then(function() {
                    window.location.href = "currentuser.php";
                });
              </script>';
        exit;
    }

    // Delete the user from the database using a prepared statement
    $query = "DELETE FROM users WHERE id = ?";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        
        if ($result) {
            echo '<script>
                    Swal.fire({
                        title: "Good job!",
                        text: "User deleted successfully!",
                        icon: "success"
                    }).then(function() {
                        window.location.href = "currentuser.php";
                    });
                  </script>';
        } else {
            echo '<script>
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to delete user!",
                        icon: "error"
                    }).then(function() {
                        window.location.href = "currentuser.php";
                    });
                  </script>';
        }
    } else {
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Database error!",
                    icon: "error"
                }).then(function() {
                    window.location.href = "currentuser.php";
                });
              </script>';
    }
}
?>
