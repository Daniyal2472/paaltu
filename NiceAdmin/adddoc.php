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
                    <form method="post" action="">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Enter Doctor's Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter Doctor's Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="qualification" id="qualification" placeholder="Enter Doctor's Qualification" required>
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
if (isset($_POST['add_doctor'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $qualification = $_POST['qualification'];

    // Add doctor to the database
    $query = mysqli_query($con, "INSERT INTO `doctors`(`id`, `name`, `email`, `qualification`) VALUES ('', '$name', '$email', '$qualification')");

    if ($query) {
        $message = "Doctor added successfully";
    } else {
        $message = "Error in adding doctor";
    }

    // Reload the page to display updated doctors list
    echo "<script>location.assign('adddoc.php')</script>";
}

// Close the database connection
mysqli_close($con);
?>
