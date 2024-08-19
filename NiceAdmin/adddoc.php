<?php
include("header.php");

// Example user data
$user = ['role' => $_SESSION['role']]; 

// Check if the user is allowed to add a new doctor (only admins can add doctors)
if (!authorize('create_doctors', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to add a doctor. Only admins can perform this action.</div></div>';
    exit;
}

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$message = ''; // Initialize message variable

if (isset($_POST['add_doctor'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $qualification = mysqli_real_escape_string($con, $_POST['qualification']);

    // Handle the image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        // Define allowed file types and size limit
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        $max_size = 2 * 1024 * 1024; // 2MB

        if (in_array($image_ext, $allowed_ext) && $image_size <= $max_size) {
            // Define upload directory and create a unique file name to prevent overwriting
            $upload_dir = '../doctors/';
            $unique_image_name = uniqid('doc_', true) . '.' . $image_ext;
            $image_path = $upload_dir . $unique_image_name;

            if (move_uploaded_file($image_tmp, $image_path)) {
                // Insert doctor into the database
                $query = "INSERT INTO `doctors` (`name`, `email`, `qualification`, `image`) VALUES ('$name', '$email', '$qualification', '$image_path')";
                $result = mysqli_query($con, $query);

                if ($result) {
                    $_SESSION['status'] = "Doctor added successfully!";
                    echo '<script>
                        Swal.fire({
                            title: "Good job!",
                            text: "Doctor added successfully!",
                            icon: "success"
                        }).then(function() {
                            window.location.href = "doclist.php";
                        });
                      </script>';
                } else {
                    $message = "Error in adding doctor: " . mysqli_error($con);
                }
            } else {
                $message = "Error in uploading image";
            }
        } else {
            $message = "Invalid file type or file too large. Allowed types: jpg, jpeg, png. Max size: 2MB.";
        }
    } else {
        $message = "Image is required.";
    }

    // Display the message if there's any
    if ($message) {
        echo "<script>Swal.fire('Error', '$message', 'error');</script>";
    }
}

// Close the database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
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
                        <span class="text-black">ADD DOCTOR</span>
                    </h6>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Enter Doctor's Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter Doctor's Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="qualification" id="qualification" placeholder="Enter Doctor's Qualification" required>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control form-control-lg" name="image" id="image" accept="image/*" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="add_doctor" type="submit" class="btn btn-dark btn-lg rounded-1" value="Add Doctor">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
