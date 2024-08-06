<?php
include("header.php");
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user details from the database
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $query = "UPDATE users SET name='$name', email='$email', role='$role' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'User updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'user_table.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error updating user',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'user_table.php';
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
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">User</span></h2>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo $user['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="email" value="<?php echo $user['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control form-control-lg" name="role" id="role" value="<?php echo $user['role']; ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="update_user" type="submit" class="btn btn-dark btn-lg rounded-1" value="Update User">
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
