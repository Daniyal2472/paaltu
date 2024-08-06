<?php
include("header.php");
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch category details from the database
    $query = "SELECT * FROM categories WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $category = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_cat'])) {
    $name = $_POST['name'];

    $query = "UPDATE categories SET name='$name' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                alert('Accessory updated successfully!');
                window.location.href = 'catlist.php';
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
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">Category</span></h2>
                    <form method="post" action="">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo $category['name']; ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="update_cat" type="submit" class="btn btn-dark btn-lg rounded-1" value="Update Category">
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
