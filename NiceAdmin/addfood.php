<?php
include("header.php");

if (isset($_POST['add_food'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);

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
        $query = "INSERT INTO foods (name, category_id, image, weight, quantity,price) VALUES ('$name', '$category_id', '$imageDestination', '$weight', '$quantity','$price')";
        $result = mysqli_query($con, $query);

        if ($result) {
      $_SESSION['status'] = "Food item added successfully!";
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
        } else {
            echo "<script>alert('Error adding food item');</script>";
        }
    } else {
        echo "<script>alert('Error: Unsupported file extension. Please use jpg, jpeg, png for images.')</script>";
    }
}
?>


<body>
    <section id="register" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5">
                    <h2 class="display-3 fw-normal text-center">Add <span class="text-primary">Food</span></h2>
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
                            <input type="number" class="form-control form-control-lg" name="quantity" id="quantity" placeholder="Enter Quantity" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="price" id="quantity" placeholder="Enter Price" required>
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