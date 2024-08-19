<?php
include("header.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer

    // Fetch pet details from the database
    $query = "SELECT * FROM pets WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pet = $result->fetch_assoc();
    $stmt->close();

    $user = ['id' => intval($_SESSION['user_id']), 'role' => $_SESSION['role']];
    $petCheck = ['id' => intval($pet['id']), 'owner_id' => intval($pet['user_id'])];

    if (!authorize('update_pet', $user, $petCheck)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update this pet.</div></div>';
        exit;
    }
}

if (isset($_POST['update_pet'])) {
    $user_id = intval($_POST['user_id']);
    $name = $_POST['name'];
    $category_id = intval($_POST['category_id']);
    $breed = $_POST['breed'];
    $price = floatval($_POST['price']);
    $age = intval($_POST['age']);
    $description = $_POST['description'];

    // Handle image upload if a new image is provided
    if (!empty($_FILES['image']['name'])) {
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        $imagePath = $pet['image'];
    }

    $query = "UPDATE pets SET user_id = ?, name = ?, category_id = ?, breed = ?, price = ?, age = ?, description = ?, image = ? WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("isiiisssi", $user_id, $name, $category_id, $breed, $price, $age, $description, $imagePath, $id);

    if ($stmt->execute()) {
        echo '<script>
        Swal.fire({
            title: "Good job!",
            text: "Pet updated successfully!",
            icon: "success"
        }).then(function() {
            window.location.href = "petlist.php";
        });
      </script>';
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error updating pet',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'pets_table.php';
                });
              </script>";
    }
    $stmt->close();
}
?>

<body>
    <section id="update" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5">
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">Pet</span></h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID</label>
                            <input type="number" class="form-control form-control-lg" name="user_id" id="user_id" value="<?php echo htmlspecialchars($pet['user_id'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo htmlspecialchars($pet['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category ID</label>
                            <input type="number" class="form-control form-control-lg" name="category_id" id="category_id" value="<?php echo htmlspecialchars($pet['category_id'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="breed" class="form-label">Breed</label>
                            <input type="text" class="form-control form-control-lg" name="breed" id="breed" value="<?php echo htmlspecialchars($pet['breed'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control form-control-lg" name="price" id="price" value="<?php echo htmlspecialchars($pet['price'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control form-control-lg" name="age" id="age" value="<?php echo htmlspecialchars($pet['age'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control form-control-lg" name="description" id="description" required><?php echo htmlspecialchars($pet['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control form-control-lg" name="image" id="image">
                            <?php if (!empty($pet['image'])): ?>
                                <img src="<?php echo htmlspecialchars($pet['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($pet['name'], ENT_QUOTES, 'UTF-8'); ?>" width="100" class="mt-2">
                            <?php endif; ?>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" name="update_pet" class="btn btn-primary btn-lg">Update Pet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('updateButton').addEventListener('click', function() {
            var form = document.getElementById('updateForm');
            var confirmUpdate = confirm("Are you sure you want to update this pet's details?");
            if (confirmUpdate) {
                form.submit();
            }
        });
    </script>

    <?php
    include("footer.php");
    ?>
</body>
</html>
