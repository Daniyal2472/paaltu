
<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to add a new pet (only admins can add pets)
if (!authorize('create_food', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update this pet.Only admins can perform this action.</div></div>';
    exit;
}
if (isset($_POST['add_food'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

  

    // Check if the user_id exists in the users table
    $checkUserQuery = "SELECT * FROM users WHERE id='$user_id'";
    $userResult = mysqli_query($con, $checkUserQuery);

    if (mysqli_num_rows($userResult) == 0) {
        echo "<script>alert('Invalid User ID');</script>";
    } else {
        // Handle file uploads
        $imageFileName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];

        // Specify the destination directory for uploaded files
        $imageDestination = "../accessories/" . $imageFileName;

        // Check file extensions
        $imageExtension = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));

        if (in_array($imageExtension, ['jpg', 'jpeg', 'png'])) {
            // Move uploaded files to specific directories
            move_uploaded_file($imageTmpName, $imageDestination);

            // Insert data into the database
            $stmt = $con->prepare("INSERT INTO foods (user_id, name, description, category_id, image, weight, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issdsss", $user_id, $name, $description, $category_id, $imageDestination, $weight, $price);

            $result = mysqli_query($con, $query);

            if ($result) {
                $_SESSION['status'] = "Food item added successfully!";
                if (isset($_SESSION['status'])) { ?>
                    echo '<script>
                Swal.fire({
                    title: "Good job!",
                    text: "Food added successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "foodlist.php";
                });
              </script>';
                <?php
                    unset($_SESSION['status']);
                }
            } else {
                echo "<script>alert('Error adding food item');</script>";
            }
        } else {
            echo "<script>alert('Error: Unsupported file extension. Please use jpg, jpeg, png for images.')</script>";
        }
    }
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
              <span class="text-black">ADD FOOD</span></h6>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Select Category:</label>
                            <select class="form-select form-control-lg" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                <?php
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="weight" id="weight" placeholder="Enter Weight" required>
                        </div>
                        <div class="mb-3">
                            <input type="description" class="form-control form-control-lg" name="description" id="description" placeholder="Enter description" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="price"  placeholder="Enter Price" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Image</label>
                            <input name="image" class="form-control form-control-sm" id="formFileSm" type="file" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="add_food" type="submit" class="btn btn-dark btn-lg rounded-1" value="Add Food Item">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
include("footer.php");
?>