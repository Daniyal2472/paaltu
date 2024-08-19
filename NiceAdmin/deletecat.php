<?php
include("header.php");

// Example user data
$user = ['role' => $_SESSION['role']];

// Check if the user is allowed to delete a category (only admins can delete categories)
if (!authorize('delete_category', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to delete this category. Only admins can perform this action.</div></div>';
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id']; // Sanitize ID

    // Prepare the statement to avoid SQL injection
    $deleteCategoryStmt = $con->prepare("DELETE FROM categories WHERE id = ?");
    $deleteCategoryStmt->bind_param('i', $id);

    try {
        $result = $deleteCategoryStmt->execute();

        if ($result) {
            // Output the SweetAlert script
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                    Swal.fire({
                        title: "Good job!",
                        text: "Category deleted successfully!",
                        icon: "success"
                    }).then(function() {
                        window.location.href = "catlist.php";
                    });
                  </script>';
        } else {
            throw new Exception('Error deleting category');
        }
    } catch (Exception $e) {
        // Output the SweetAlert error script
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Failed to delete category: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '",
                    icon: "error"
                }).then(function() {
                    window.location.href = "catlist.php";
                });
              </script>';
    } finally {
        // Close the prepared statement
        $deleteCategoryStmt->close();
        // Close the database connection
        
    }
} else {
    header("Location: catlist.php");
    exit(); // Ensure to call exit() after header redirection
}
?>
