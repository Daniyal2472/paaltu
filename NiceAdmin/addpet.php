<?php
include("header.php");
session_start(); // Ensure session is started

// Simulate getting the current user from the database
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to add a new pet (only admins can add pets)
if (!authorize('create_pet', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update this pet. Only admins can perform this action.</div></div>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet</title>
    <!-- Add your CSS links here -->
</head>
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
                        <span class="text-black">ADD PETS</span>
                    </h6>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="breed" id="breed" placeholder="Enter Breed" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="colour" id="colour" placeholder="Enter Colour" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="weight" id="weight" placeholder="Enter Weight" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="height" id="height" placeholder="Enter Height" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select form-select-lg" name="gender" id="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Vaccination_Status" class="form-label">Vaccination Status</label>
                            <select class="form-select form-select-lg" name="Vaccination_Status" id="Vaccination_Status" required>
                                <option value="" disabled selected>Select Status</option>
                                <option value="Non-Vaccinated">Non-Vaccinated</option>
                                <option value="Vaccinated">Vaccinated</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="age" id="age" placeholder="Enter Age" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="price" id="price" placeholder="Enter Price" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Pet's Description</label>
                            <textarea name="description" id="description" placeholder="Enter a brief description of the pet" class="form-control form-control-lg" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category:</label>
                            <select class="form-select form-control-lg" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <?php
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo htmlspecialchars($row['id']); ?>"><?php echo htmlspecialchars($row['name']); ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Image</label>
                            <input name="picture" class="form-control form-control-sm" id="formFileSm" type="file" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="add_prod" type="submit" class="btn btn-dark btn-lg rounded-1" value="Add Product">
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

// Ensure the database connection is established
$con = mysqli_connect("localhost", "username", "password", "database");

if (isset($_POST['add_prod'])) {
    // Retrieve and sanitize input data
    $name = $_POST['name'];
    $category = $_POST['category'];
    $breed = $_POST['breed'];
    $description = $_POST['description'];
    $colour = $_POST['colour'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $vaccination_status = $_POST['Vaccination_Status'];
    $age = $_POST['age'];
    $price = $_POST['price'];

    // Handle file uploads
    $pictureFileName = $_FILES['picture']['name'];
    $pictureTmpName = $_FILES['picture']['tmp_name'];
    $pictureExtension = strtolower(pathinfo($pictureFileName, PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    if (in_array($pictureExtension, $allowed_extensions)) {
        // Define the destination directory and move the file
        $pictureDestination = "../accessories/" . basename($pictureFileName);
        if (move_uploaded_file($pictureTmpName, $pictureDestination)) {
            // Prepare and bind parameters for the SQL query
            $stmt = $con->prepare("INSERT INTO pets (
                user_id, name, category_id, breed, price, age, description, image, colour, weight, height, gender, vaccination_status
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Assuming you have a valid user ID for insertion
            $user_id = $_SESSION['user_id']; // Or hard-code if necessary
            $stmt->bind_param(
                "isisdsssssss", 
                $user_id, $name, $category, $breed, $price, $age, $description, $pictureDestination, 
                $colour, $weight, $height, $gender, $vaccination_status
            );

            // Execute the prepared statement and check the result
            if ($stmt->execute()) {
                $_SESSION['status'] = "Data inserted successfully";
                echo '<script>
                    Swal.fire({
                        title: "Good job!",
                        text: "Pet added successfully!",
                        icon: "success"
                    }).then(function() {
                        window.location.href = "petlist.php";
                    });
                </script>';
            } else {
                echo "<script>alert('Error adding pet: " . $stmt->error . "');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Error uploading image.');</script>";
        }
    } else {
        echo "<script>alert('Error: Unsupported file extension. Please use jpg, jpeg, png for pictures.')</script>";
    }

    // Close the database connection
    mysqli_close($con);
}
?>
