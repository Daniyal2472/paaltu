<?php
include("header.php");

// Example user data
$user = ['role' => $_SESSION['role']]; 

// Check if the user is allowed to update an accessory (only authorized users can perform this action)
if (!authorize('update_accessory', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update this accessory. Only authorized users can perform this action.</div></div>';
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch accessory details from the database using a prepared statement
    $query = "SELECT * FROM accessories WHERE id = ?";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $accessory = $result->fetch_assoc();
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Error fetching accessory details.</div>";
        exit;
    }
}

if (isset($_POST['update_acc'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Prepare SQL query to prevent SQL injection
    if (!empty($_FILES['picture']['name'])) {
        $pictureFileName = $_FILES['picture']['name'];
        $pictureTmpName = $_FILES['picture']['tmp_name'];
        $pictureExtension = strtolower(pathinfo($pictureFileName, PATHINFO_EXTENSION));

        if (in_array($pictureExtension, ['jpg', 'jpeg', 'png'])) {
            $pictureDestination = '../accessories/' . basename($pictureFileName);
            move_uploaded_file($pictureTmpName, $pictureDestination);

            // Update query with image path
            $query = "UPDATE accessories SET name=?, price=?, category_id=?, image=?, description=? WHERE id=?";
            if ($stmt = $con->prepare($query)) {
                $stmt->bind_param('sdisii', $name, $price, $category, $pictureDestination, $description, $id);
                $stmt->execute();
                $stmt->close();
            }
        } else {
            echo "<script>alert('Error: Unsupported file extension. Please use jpg, jpeg, png for pictures.');</script>";
            exit;
        }
    } else {
        // Update query without changing the image
        $query = "UPDATE accessories SET name=?, price=?, category_id=?, description=? WHERE id=?";
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param('sdisi', $name, $price, $category, $description, $id);
            $stmt->execute();
            $stmt->close();
        }
    }

    if ($stmt) {
        echo '<script>
                Swal.fire({
                    title: "Good job!",
                    text: "Accessory updated successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "acclist.php";
                });
              </script>';
    } else {
        echo "<script>alert('Error updating accessory');</script>";
    }
}
?>

<body>
    <section id="update" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5">
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">Accessory</span></h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo htmlspecialchars($accessory['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="price" id="price" value="<?php echo htmlspecialchars($accessory['price'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category:</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <?php
                                // Fetch categories and display them
                                $categories_query = "SELECT * FROM `categories`";
                                if ($categories_result = $con->query($categories_query)) {
                                    while ($row = $categories_result->fetch_assoc()) {
                                        $selected = $row['id'] == $accessory['category_id'] ? 'selected' : '';
                                        echo "<option value='" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' $selected>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="description" id="description" value="<?php echo htmlspecialchars($accessory['description'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Image</label>
                            <input name="picture" class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>

                        <div class="d-grid gap-2">
                            <input name="update_acc" type="submit" class="btn btn-dark btn-lg rounded-1" value="Update Accessory">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<?php
include("footer.php");
?>
