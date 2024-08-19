<?php
include("header.php");

// Example user data
$user = ['role' => $_SESSION['role']];

// Check if the user is allowed to delete an accessory (only admins can delete)
if (!authorize('delete_accessory', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to delete this accessory. Only admins can perform this action.</div></div>';
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id']; // Sanitize ID

    // Start a transaction
    mysqli_begin_transaction($con);

    try {
        // Prepare statements to avoid SQL injection
        $deleteOrdersStmt = $con->prepare("DELETE FROM accessory_orders WHERE product_id = ?");
        $deleteOrdersStmt->bind_param('i', $id);
        $deleteOrdersResult = $deleteOrdersStmt->execute();

        if (!$deleteOrdersResult) {
            throw new Exception('Error removing accessory from orders');
        }

        $deleteAccessoryStmt = $con->prepare("DELETE FROM accessories WHERE id = ?");
        $deleteAccessoryStmt->bind_param('i', $id);
        $deleteAccessoryResult = $deleteAccessoryStmt->execute();

        if (!$deleteAccessoryResult) {
            throw new Exception('Error deleting accessory');
        }

        // Commit the transaction
        mysqli_commit($con);

        // Output the SweetAlert script
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
                Swal.fire({
                    title: "Good job!",
                    text: "Accessory deleted successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "acclist.php";
                });
              </script>';
    } catch (Exception $e) {
        // Rollback the transaction on error
        mysqli_rollback($con);

        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Failed to delete accessory: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '",
                    icon: "error"
                }).then(function() {
                    window.location.href = "accessories_table.php";
                });
              </script>';
    } finally {
        // Close statements
        $deleteOrdersStmt->close();
        $deleteAccessoryStmt->close();
        // Close the database connection
    }
} else {
    echo '<script>
            Swal.fire({
                title: "Invalid Request!",
                text: "No valid ID provided.",
                icon: "warning"
            }).then(function() {
                window.location.href = "accessories_table.php";
            });
          </script>';
}
?>
