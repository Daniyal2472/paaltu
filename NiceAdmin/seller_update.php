<?php
include("header.php");
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch pet details from the database
    $query = "SELECT * FROM pets WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $pet = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_pet'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $breed = $_POST['breed'];
    $price = $_POST['price'];
    $age = $_POST['age'];
    $description = $_POST['description'];

    // Handle image upload if a new image is provided
    if (!empty($_FILES['image']['name'])) {
        $imagePath = '../accessories/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        $imagePath = $pet['image'];
    }

    $query = "UPDATE pets SET user_id='$user_id', name='$name', category_id='$category_id', breed='$breed', price='$price', age='$age', description='$description', image='$imagePath' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                alert('Pet updated successfully');
                window.location.href = 'pets_table.php';
              </script>";
    } else {
        echo "<script>
                alert('Error updating pet');
              </script>";
    }
}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Pet</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="pets_table.php">Pets</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Pet Details</h5>

                            <!-- Update Pet Form -->
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">User ID</label>
                                    <input type="number" class="form-control" name="user_id" id="user_id" value="<?php echo $pet['user_id']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $pet['name']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category ID</label>
                                    <input type="number" class="form-control" name="category_id" id="category_id" value="<?php echo $pet['category_id']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="breed" class="form-label">Breed</label>
                                    <input type="text" class="form-control" name="breed" id="breed" value="<?php echo $pet['breed']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" value="<?php echo $pet['price']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" name="age" id="age" value="<?php echo $pet['age']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" required><?php echo $pet['description']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <img src="../accessories/<?php echo $pet['image']; ?>" alt="Current Pet Image" style="width: 100px; height: auto;">
                                </div>
                                <button type="submit" name="update_pet" class="btn btn-primary">Update Pet</button>
                            </form>
                            <!-- End Update Pet Form -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php
include("footer.php");
?>
