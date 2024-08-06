<?php
include("header.php");
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch accessory details from the database
    $query = "SELECT * FROM accessories WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $accessory = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_acc'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Handle file uploads if a new file is uploaded
    if ($_FILES['picture']['name']) {
        $pictureFileName = $_FILES['picture']['name'];
        $pictureTmpName = $_FILES['picture']['tmp_name'];
        $pictureDestination = '../accessories/' . $pictureFileName;
        $pictureExtension = strtolower(pathinfo($pictureFileName, PATHINFO_EXTENSION));

        if (in_array($pictureExtension, ['jpg', 'jpeg', 'png'])) {
            move_uploaded_file($pictureTmpName, $pictureDestination);
            $query = "UPDATE accessories SET name='$name', price='$price', category_id='$category', image='$pictureDestination', description='$description' WHERE id='$id'";
        } else {
            echo "<script>alert('Error: Unsupported file extension. Please use jpg, jpeg, png for pictures.');</script>";
            exit;
        }
    } else {
        $query = "UPDATE accessories SET name='$name', price='$price', category_id='$category', description='$description' WHERE id='$id'";
    }

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                alert('Accessory updated successfully!');
                window.location.href = 'acclist.php';
              </script>";
    } else {
        echo "<script>alert('Error updating accessory.');</script>";
    }
}
?>

<body>
    <section id="update" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5">
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">Accessory</span></h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo $accessory['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" name="price" id="price" value="<?php echo $accessory['price']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category:</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <?php
                                $categories_query = "SELECT * FROM `categories`";
                                $categories_result = mysqli_query($con, $categories_query);
                                if ($categories_result) {
                                    while ($row = mysqli_fetch_assoc($categories_result)) {
                                        $selected = $row['id'] == $accessory['category_id'] ? 'selected' : '';
                                        echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="description" id="description" value="<?php echo $accessory['description']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Image</label>
                            <input name="picture" class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>

                        <div class="d-grid gap-2">
                            <input name="update_acc" type="submit" class="btn btn-dark btn-lg rounded-1" value="Update Accessory">
                        </div>
                    </form>
                </div
