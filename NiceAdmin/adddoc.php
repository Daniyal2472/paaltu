<?php
include("header.php");
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Doctor</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <section id="register" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5">
                    <h2 class="display-3 fw-normal text-center">Add <span class="text-primary">Doctor</span></h2>
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


                    <!-- Display success message -->
                    <?php if (isset($message)) { echo "<div class='alert alert-success'>$message</div>"; } ?>

                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php



// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['add_doctor'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $qualification = $_POST['qualification'];

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
            // Define upload directory and move file
            $upload_dir = '../doctors/';
            $image_path = $upload_dir . $image;
            if (move_uploaded_file($image_tmp, $image_path)) {
                // Insert doctor into the database
                $query = "INSERT INTO `doctors`(`id`, `name`, `email`, `qualification`, `image`) VALUES ('', '$name', '$email', '$qualification', '$image')";
                $result = mysqli_query($con, $query);

                if ($result) {
                    $message = "Doctor added successfully";
                } else {
                    $message = "Error in adding doctor: " . mysqli_error($con);
                }
            } else {
                $message = "Error in uploading image";
            }
        } else {
            $message = "Invalid file type or file too large";
        }
    } else {
        $message = "Image is required";
    }

    // Display success or error message
    echo "<div class='alert alert-success'>$message</div>";

    // Reload the page to display updated doctors list
    echo "<script>setTimeout(function(){ location.assign('adddoc.php'); }, 2000);</script>";
}

// Close the database connection
mysqli_close($con);
?>
