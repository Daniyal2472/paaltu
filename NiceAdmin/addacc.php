<?php
include("header.php");
include("connection.php");
?>

<body>
    <section id="register" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5">
                    <h2 class="display-3 fw-normal text-center">Add <span class="text-primary">Accessory</span></h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="price" id="price" placeholder="Enter Price" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category:</label>
                            <select class="form-select" id="category" name="category" required>
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
                            <input type="text" class="form-control form-control-lg" name="description" id="description" placeholder="Enter Description" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Image</label>
                            <input name="picture" class="form-control form-control-sm" id="formFileSm" type="file" required>
                        </div>

                        <div class="d-grid gap-2">
                            <input name="add_acc" type="submit" class="btn btn-dark btn-lg rounded-1" value="Add Accessory">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
if (isset($_POST['add_acc'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Handle file uploads
    $pictureFileName = $_FILES['picture']['name'];
    $pictureTmpName = $_FILES['picture']['tmp_name'];

    // Specify the destination directory for uploaded files
    $pictureDestination = '../accessories/' . $pictureFileName; // Relative path

    // Check file extensions
    $pictureExtension = strtolower(pathinfo($pictureFileName, PATHINFO_EXTENSION));

    if (in_array($pictureExtension, ['jpg', 'jpeg', 'png'])) {
        // Move uploaded files to specific directory
        move_uploaded_file($pictureTmpName, $pictureDestination);

        // Insert data into the database
        $query = "INSERT INTO accessories(name, price, category_id, image, description) VALUES ('$name', '$price', '$category', '$pictureDestination', '$description')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>location.assign('index.php')</script>";
        } else {
            echo "<script>alert('Error adding accessory.');</script>";
        }
    } else {
        echo "<script>alert('Error: Unsupported file extension. Please use jpg, jpeg, png for pictures.')</script>";
    }
}
?>
