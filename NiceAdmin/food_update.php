<?php
include("header.php");
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch food details from the database
    $query = "SELECT * FROM foods WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $food = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_food'])) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $weight = $_POST['weight'];
    $quantity = $_POST['quantity'];

    // Handle image upload if a new image is provided
    if (!empty($_FILES['image']['name'])) {
        $imagePath = '../foods/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        $imagePath = $food['image'];
    }

    $query = "UPDATE foods SET name='$name', category_id='$category_id', weight='$weight', quantity='$quantity', image='$imagePath' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                alert('Food updated successfully');
                window.location.href = 'foods_table.php';
              </script>";
    } else {
        echo "<script>
                alert('Error updating food');
              </script>";
    }
}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Food</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="foods_table.php">Foods</a></li>
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
                            <h5 class="card-title">Update Food Details</h5>

                            <!-- Update Food Form -->
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $food['name']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category ID</label>
                                    <input type="number" class="form-control" name="category_id" id="category_id" value="<?php echo $food['category_id']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="text" class="form-control" name="weight" id="weight" value="<?php echo $food['weight']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo $food['quantity']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <img src="../foods/<?php echo $food['image']; ?>" alt="Current Food Image" style="width: 100px; height: auto;">
                                </div>
                                <button type="submit" name="update_food" class="btn btn-primary">Update Food</button>
                            </form>
                            <!-- End Update Food Form -->
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
