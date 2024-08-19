<?php
include("header.php");

$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to add a new category (only admins can add categories)
if (!authorize('create_category', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to add a new category. Only admins can perform this action.</div></div>';
    exit;
}
?>

<body>
    <section id="register" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5 text-center">
                    <div class="text-center">
                        <div class="main-logo">
                            <a href="index.php">
                                <img src="../NiceAdmin/assets/img/paltoo.png" alt="logo" class="img-fluid logo-img" style="height: 120px; width: auto;">
                            </a>
                        </div>
                    </div>

                    <h6 class="display-5 fw-normal text-center mt-2">
                        <span class="text-black">ADD CATEGORY</span>
                    </h6>
                    <form method="post" action="">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="category_name" id="category_name" placeholder="Enter Category Name" required>
                        </div>

                        <div class="d-grid gap-2">
                            <input name="add_category" type="submit" class="btn btn-dark btn-lg rounded-1" value="Add Category">
                        </div>
                    </form>

                    <!-- Display success message -->
                    <?php if (isset($message)) { echo "<div class='alert alert-success'>$message</div>"; } ?>

                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
if (isset($_POST['add_category'])) {
    $category_name = trim($_POST['category_name']); // Trim spaces

    if (!empty($category_name)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $category_name);

        if ($stmt->execute()) {
            $_SESSION['status'] = "Category added successfully!";
            if (isset($_SESSION['status'])) {
                echo '<script>
                    Swal.fire({
                        title: "Good job!",
                        text: "Category added successfully!",
                        icon: "success"
                    }).then(function() {
                        window.location.href = "catlist.php";
                    });
                  </script>';
                unset($_SESSION['status']);
            }
        } else {
            echo "<script>alert('Error adding category. Please try again.');</script>";
        }
        $stmt->close(); // Close the statement
    } else {
        echo "<script>alert('Category name cannot be empty.');</script>";
    }
}
?>
