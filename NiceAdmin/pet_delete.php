<?php
include("header.php");

// Assuming $pet is fetched from the database earlier in your code
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer

    // Fetch the pet details to check ownership
    $petQuery = "SELECT * FROM pets WHERE id = ?";
    $stmt = $con->prepare($petQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $petResult = $stmt->get_result();
    $pet = $petResult->fetch_assoc();
    $stmt->close();

    // Define user and pet details for authorization check
    $user = ['id' => intval($_SESSION['user_id']), 'role' => $_SESSION['role']];
    $petCheck = ['id' => intval($pet['id']), 'owner_id' => intval($pet['user_id'])];

    // Authorization check
    if (!authorize('update_pet', $user, $petCheck)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update this pet.</div></div>';
        exit;
    }

    // Start a transaction
    mysqli_begin_transaction($con);

    try {
        // First, delete dependent records from cart
        $deleteCartQuery = "DELETE FROM cart WHERE pet_id = ?";
        $stmt = $con->prepare($deleteCartQuery);
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            throw new Exception('Error removing pet from cart');
        }
        $stmt->close();

        // Then, delete dependent records from pet_orders
        $deleteOrdersQuery = "DELETE FROM pet_orders WHERE product_id = ?";
        $stmt = $con->prepare($deleteOrdersQuery);
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            throw new Exception('Error removing pet from orders');
        }
        $stmt->close();

        // Now delete the pet from the pets table
        $deletePetQuery = "DELETE FROM pets WHERE id = ?";
        $stmt = $con->prepare($deletePetQuery);
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            throw new Exception('Error deleting pet');
        }
        $stmt->close();

        // Commit the transaction
        mysqli_commit($con);

        echo '<script>
        Swal.fire({
            title: "Good job!",
            text: "Pet deleted successfully!",
            icon: "success"
        }).then(function() {
            window.location.href = "petlist.php";
        });
      </script>';
    } catch (Exception $e) {
        // Rollback the transaction in case of error
        mysqli_rollback($con);

        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: '" . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'petlist.php';
                });
              </script>";
    }
} else {
    header("Location: petlist.php");
    exit;
}
?>
