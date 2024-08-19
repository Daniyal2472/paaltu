<?php
include("header.php");

// Example user data
$user = ['role' => $_SESSION['role']];

// Check if the user is allowed to delete a food item (only admins can delete)
if (!authorize('delete_foods', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to perform this action. Only admins can delete food items.</div></div>';
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Start a transaction
    mysqli_begin_transaction($con);

    try {
        // First, delete dependent records from food_orders using a prepared statement
        $deleteOrdersStmt = $con->prepare("DELETE FROM food_orders WHERE product_id = ?");
        $deleteOrdersStmt->bind_param("i", $id);
        $deleteOrdersStmt->execute();

        if ($deleteOrdersStmt->affected_rows === 0) {
            throw new Exception('Error removing food from orders or no orders found.');
        }

        // Now delete the food from the foods table using a prepared statement
        $deleteFoodStmt = $con->prepare("DELETE FROM foods WHERE id = ?");
        $deleteFoodStmt->bind_param("i", $id);
        $deleteFoodStmt->execute();

        if ($deleteFoodStmt->affected_rows === 0) {
            throw new Exception('Error deleting food or food item not found.');
        }

        // Commit the transaction
        mysqli_commit($con);

        // Output success message using SweetAlert
        echo '<script>
                Swal.fire({
                    title: "Good job!",
                    text: "Food deleted successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "foodlist.php";
                });
              </script>';
    } catch (Exception $e) {
        // Rollback the transaction on error
        mysqli_rollback($con);

        // Output error message using SweetAlert
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Failed to delete food: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '",
                    icon: "error"
                }).then(function() {
                    window.location.href = "foodlist.php";
                });
              </script>';
    }
} else {
    header("Location: foodlist.php");
    exit(); // Ensure to call exit() after header redirection
}
?>
