<?php
include("header.php");

// Example user data
$user = ['role' => $_SESSION['role']]; 

// Check if the user is allowed to update a category (only authorized users can perform this action)
if (!authorize('update_category', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update this category. Only authorized users can perform this action.</div></div>';
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch category details from the database using a prepared statement
    $query = "SELECT * FROM categories WHERE id = ?";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $category = $result->fetch_assoc();
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Error fetching category details.</div>";
        exit;
    }
}

if (isset($_POST['update_cat'])) {
    $name = $_POST['name'];

    // Prepare SQL query to prevent SQL injection
    $query = "UPDATE categories SET name = ? WHERE id = ?";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param('si', $name, $id);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            echo '<script>
                    Swal.fire({
                        title: "Good job!",
                        text: "Category updated successfully!",
                        icon: "success"
                    }).then(function() {
                        window.location.href = "catlist.php";
                    });
                  </script>';
        } else {
            echo "<script>alert('Error updating category.');</script>";
        }
    } else {
        echo "<script>alert('Error preparing statement.');</script>";
    }
}
?>

<body>
    <section id="update" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5">
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">Category</span></h2>
                    <form method="post" action="">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="update_cat" type="submit" class="btn btn-dark btn-lg rounded-1" value="Update Category">
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
