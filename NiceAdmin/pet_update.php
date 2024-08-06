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
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        $imagePath = $pet['image'];
    }

    $query = "UPDATE pets SET user_id='$user_id', name='$name', category_id='$category_id', breed='$breed', price='$price', age='$age', description='$description', image='$imagePath' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Pet updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'pets_table.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error updating pet',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'pets_table.php';
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
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">Pet</span></h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID</label>
                            <input type="number" class="form-control form-control-lg" name="user_id" id="user_id" value="<?php echo $pet['user_id']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo $pet['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category ID</label>
                            <input type="number" class="form-control form-control-lg" name="category_id" id="category_id" value="<?php echo $pet['category_id']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="breed" class="form-label">Breed</label>
                            <input type="text" class="form-control form-control-lg" name="breed" id="breed" value="<?php echo $pet['breed']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control form-control-lg" name="price" id="price" value="<?php echo $pet['price']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control form-control-lg" name="age" id="age" value="<?php echo $pet['age']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control form-control-lg" name="description" id="description" required><?php echo $pet['description']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control form-control-lg" name="image" id="image">
                            <img src="<?php echo $pet['image']; ?>" alt="<?php echo $pet['name']; ?>" width="100">
