<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Product</title>
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
                    <h2 class="display-3 fw-normal text-center">Add <span class="text-primary">Pet</span></h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="breed" id="breed" placeholder="Enter Breed" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="age" id="age" placeholder="Enter Age" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="price" id="price" placeholder="Enter Price" required>
                        </div>
                        <div class="mb-3">
                            <label for="pet_description" class="formbold-form-label">Pet's Description</label>
                            <textarea name="pet_description" id="pet_description" placeholder="Enter a brief description of the pet" class="form-control form-control-lg" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category:</label>
                            <select class="form-select form-control-lg" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <?php
                                $query = "SELECT * FROM `categories`";
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

if (isset($_POST['add_prod'])) {
  $name = $_POST['name'];
  $category = $_POST['category'];
  $breed = $_POST['breed'];
  $age = $_POST['age'];
  $price = $_POST['price'];
  $description = $_POST['description'];
     

  // Handle file uploads
  $pictureFileName = $_FILES['picture']['name'];
  $pictureTmpName = $_FILES['picture']['tmp_name'];

  // Specify the destination directories for uploaded files
  $pictureDestination = "../accessories/" . $pictureFileName;

  // Check file extensions
  $pictureExtension = strtolower(pathinfo($pictureFileName, PATHINFO_EXTENSION));

  

  if (in_array($pictureExtension, ['jpg', 'jpeg', 'png'])) {
      // Move uploaded files to specific directories
      move_uploaded_file($pictureTmpName, $pictureDestination);
      // move_uploaded_file($trailerTmpName, $trailerDestination);

      // Insert data into the database
      $query = "INSERT INTO `pets`(`id`, `user_id`, `name`, `category_id`, `breed`, `price`, `age`, `description`, `image`, `role`) VALUES ('','1','$name','$category','$breed','$price','$age','$description','$pictureDestination','Admin')";
      $result = mysqli_query($con, $query);

      if ($result) {
        session_start();
        $_SESSION['status'] = "Data inserted successfully";
          echo "<script>location.assign('index.php')</script>";
      } else {
          echo "<script>alert('Error adding pet.');</script>";
      }
  } else {
      echo "<script>alert('Error: Unsupported file extension. Please use jpg, jpeg, png for pictures and mp4, avi, mkv for trailers.')</script>";
  }
}
?>
