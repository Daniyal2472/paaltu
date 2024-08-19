<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to delete an accessory (only admins can delete accessories)
if (!authorize('delete_seller', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to delete this accessory. Only admins can perform this action.</div></div>';
    exit;
}

// Ensure the database connection is included if it's in a separate file
// include("connection.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer

    // Start a transaction
    $con->begin_transaction();

    try {
        // Delete related records from pet_orders table first
        $delete_orders_query = "DELETE FROM pet_orders WHERE product_id = ?";
        $stmt = $con->prepare($delete_orders_query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        // Now delete the pet
        $query = "DELETE FROM pets WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Commit the transaction
            $con->commit();

            echo '<script>
            Swal.fire({
                title: "Good job!",
                text: "Pet deleted successfully!",
                icon: "success"
            }).then(function() {
                window.location.href = "sellerlist.php";
            });
            </script>';
        } else {
            throw new Exception("Error deleting pet");
        }

        $stmt->close(); // Close the statement
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $con->rollback();
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href = 'pets_table.php';
              </script>";
    }
}
?>
