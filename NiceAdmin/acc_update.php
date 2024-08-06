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

if (isset($_POST['update_accessory'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];

    // Handle image upload if a new image is provided
    if (!empty($_FILES['image']['name'])) {
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        $imagePath = $accessory['image'];
    }

    $query = "UPDATE accessories SET name='$name', price='$price', category_id='$category_id', image='$imagePath', description='$description' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Accessory updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'accessories_table.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error updating accessory',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'accessories_table.php';
                });
              </script>";
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
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo $accessory['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control form-control-lg" name="price" id="price" value="<?php echo $accessory['price']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category ID</label>
                            <input type="number" class="form-control form-control-lg" name="category_id" id="category_id" value="<?php echo $accessory['category_id']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control form-control-lg" name="image" id="image">
                            <img src="<?php echo $accessory['image']; ?>" alt="<?php echo $accessory['name']; ?>" width="100">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control form-control-lg" name="description" id="description" required><?php echo $accessory['description']; ?></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="update_accessory" type="submit" class="btn btn-dark btn-lg rounded-1" value="Update Accessory">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<?php
include("footer.php");
?>
