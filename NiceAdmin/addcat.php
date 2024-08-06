<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Category</title>
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
                    <h2 class="display-3 fw-normal text-center">Add <span class="text-primary">Category</span></h2>
                    <form method="post" action="">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="category_name" id="category_name" placeholder="Enter Category Name">
                        </div>
                        <div class="mb-3">
                         <input type="text" class="form-control form-control-lg" name="file_name" id="file_name" placeholder="Enter File Name">
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
    $category_name = $_POST['category_name'];

    $query = "INSERT INTO `categories`(`id`, `name`) VALUES ('', '$category_name')";
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['status'] = "Accessory added successfully!";
        if(isset($_SESSION['status'])){?>
          <script>
            swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "success",
            button: "Okay",
          });
          </script>
            
            <?php
            unset($_SESSION['status']);
            }
    }
    }

?>