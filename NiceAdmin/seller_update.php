<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to delete an accessory (only admins can delete accessories)
if (!authorize('update_seller', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to delete this accessory. Only admins can perform this action.</div></div>';
    exit;
}

// Check if 'id' is set in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input

    // Fetch pet details from the database using prepared statements
    $query = "SELECT * FROM pets WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pet = $result->fetch_assoc();
    $stmt->close();
}

if (isset($_POST['update_pet'])) {
    $user_id = intval($_POST['user_id']); // Sanitize and validate
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); // Sanitize
    $category_id = intval($_POST['category_id']); // Sanitize
    $breed = htmlspecialchars($_POST['breed'], ENT_QUOTES, 'UTF-8'); // Sanitize
    $price = floatval($_POST['price']); // Sanitize and validate
    $age = intval($_POST['age']); // Sanitize and validate
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8'); // Sanitize

    // Handle image upload securely
    if (!empty($_FILES['image']['name'])) {
        $imagePath = '../accessories/' . basename($_FILES['image']['name']);
        // Check if the file is an image and move it securely
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        } else {
            echo "<script>alert('Invalid file type.');</script>";
            exit;
        }
    } else {
        $imagePath = $pet['image'];
    }

    // Update pet details using prepared statements
    $query = "UPDATE pets SET user_id = ?, name = ?, category_id = ?, breed = ?, price = ?, age = ?, description = ?, image = ? WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("isssdisii", $user_id, $name, $category_id, $breed, $price, $age, $description, $imagePath, $id);
    $result = $stmt->execute();

    if ($result) {
        echo '<script>
            Swal.fire({
                title: "Good job!",
                text: "Pet updated successfully!",
                icon: "success"
            }).then(function() {
                window.location.href = "sellerlist.php";
            });
        </script>';
    } else {
        echo "<script>
                alert('Error updating pet');
                window.location.href = 'pets_table.php';
              </script>";
    }
    $stmt->close();
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Update Pet</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="pets_table.php">Pets</a></li>
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
                            <h5 class="card-title">Update Pet Details</h5>

                            <!-- Update Pet Form -->
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">User ID</label>
                                    <input type="number" class="form-control" name="user_id" id="user_id" value="<?php echo htmlspecialchars($pet['user_id'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($pet['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category ID</label>
                                    <input type="number" class="form-control" name="category_id" id="category_id" value="<?php echo htmlspecialchars($pet['category_id'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="breed" class="form-label">Breed</label>
                                    <input type="text" class="form-control" name="breed" id="breed" value="<?php echo htmlspecialchars($pet['breed'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" step="0.01" class="form-control" name="price" id="price" value="<?php echo htmlspecialchars($pet['price'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" name="age" id="age" value="<?php echo htmlspecialchars($pet['age'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" required><?php echo htmlspecialchars($pet['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <img src="../accessories/<?php echo htmlspecialchars($pet['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Current Pet Image" style="width: 100px; height: auto;">
                                </div>
                                <button type="submit" name="update_pet" class="btn btn-primary">Update Pet</button>
                            </form>
                            <!-- End Update Pet Form -->
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
