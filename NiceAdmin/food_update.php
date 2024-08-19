<?php
include("header.php");


$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to update a food item (only admins can update)
if (!authorize('update_foods', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to perform this action. Only admins can update food items.</div></div>';
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Fetch food details from the database
    $query = "SELECT * FROM foods WHERE id=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $food = $stmt->get_result()->fetch_assoc();
}

if (isset($_POST['update_food'])) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $weight = $_POST['weight'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null; // Default to null if not set

    // Handle image upload if a new image is provided
    $imagePath = $food['image']; // Default to existing image
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = '../foods/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Create directory if it does not exist
        }

        $imageFile = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $imageName;

        if (move_uploaded_file($imageFile, $targetPath)) {
            $imagePath = $imageName;
        } else {
            echo "<script>alert('Failed to upload image');</script>";
        }
    }

    // Update food details in the database using prepared statement
    $query = "UPDATE foods SET name=?, category_id=?, weight=?, quantity=?, image=? WHERE id=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("siissi", $name, $category_id, $weight, $quantity, $imagePath, $id);

    if ($stmt->execute()) {
        echo '<script>
                Swal.fire({
                    title: "Good job!",
                    text: "Food updated successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "foodlist.php";
                });
              </script>';
    } else {
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Failed to update food.",
                    icon: "error"
                }).then(function() {
                    window.location.href = "foodlist.php";
                });
              </script>';
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Update Food</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="foods_table.php">Foods</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Food Details</h5>

                            <!-- Update Food Form -->
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($food['name']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category ID</label>
                                    <input type="number" class="form-control" name="category_id" id="category_id" value="<?php echo htmlspecialchars($food['category_id']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="text" class="form-control" name="weight" id="weight" value="<?php echo htmlspecialchars($food['weight']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo htmlspecialchars($food['quantity']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <?php if (!empty($food['image'])): ?>
                                    <img src="../foods/<?php echo htmlspecialchars($food['image']); ?>" alt="Current Food Image" style="width: 100px; height: auto;">
                                    <?php endif; ?>
                                </div>
                                <button type="submit" name="update_food" class="btn btn-primary">Update Food</button>
                            </form>
                            <!-- End Update Food Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php
include("footer.php");
?>
