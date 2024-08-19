<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to delete an accessory (only admins can delete accessories)
if (!authorize('update_users', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to delete this accessory. Only admins can perform this action.</div></div>';
    exit;
}

// Ensure user ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid request.";
    exit();
}

$id = intval($_GET['id']); // Ensure the ID is an integer

// Fetch user details from the database using prepared statements
if ($stmt = $con->prepare("SELECT * FROM users WHERE id = ?")) {
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if (!$user) {
        echo "User not found.";
        exit();
    }
} else {
    echo "Database query error.";
    exit();
}

if (isset($_POST['update_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Update user details using prepared statements
    if ($stmt = $con->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?")) {
        $stmt->bind_param('sssi', $name, $email, $role, $id);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            echo '<script>
                Swal.fire({
                    title: "Good job!",
                    text: "User updated successfully!",
                    icon: "success"
                }).then(function() {
                    window.location.href = "currentuser.php";
                });
            </script>';
        } else {
            echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Error updating user",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = "user_table.php";
                });
            </script>';
        }
    } else {
        echo "Database query error.";
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
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="email" value="<?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control form-control-lg" name="role" id="role" value="<?php echo htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8'); ?>" required>
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
