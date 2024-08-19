<?php
include("header.php");

// Example user data
$user = ['role' => $_SESSION['role']];

// Check if the user is allowed to update a doctor (only admins can update doctors)
if (!authorize('update_doctors', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update this doctor. Only admins can perform this action.</div></div>';
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id']; // Sanitize ID

    // Fetch doctor details from the database using prepared statements
    $fetchDoctorStmt = $con->prepare("SELECT * FROM doctors WHERE id = ?");
    $fetchDoctorStmt->bind_param('i', $id);
    $fetchDoctorStmt->execute();
    $result = $fetchDoctorStmt->get_result();
    $doctor = $result->fetch_assoc();

    if (!$doctor) {
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Doctor not found!",
                    icon: "error"
                }).then(function() {
                    window.location.href = "doclist.php";
                });
              </script>';
        exit;
    }

    // Handle form submission for updating doctor details
    if (isset($_POST['update_doctor'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $qualification = $_POST['qualification'];

        // Prepare the update statement
        $updateDoctorStmt = $con->prepare("UPDATE doctors SET name = ?, email = ?, qualification = ? WHERE id = ?");
        $updateDoctorStmt->bind_param('sssi', $name, $email, $qualification, $id);

        try {
            $result = $updateDoctorStmt->execute();

            if ($result) {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>
                        Swal.fire({
                            title: "Good job!",
                            text: "Doctor updated successfully!",
                            icon: "success"
                        }).then(function() {
                            window.location.href = "doclist.php";
                        });
                      </script>';
            } else {
                throw new Exception('Failed to update doctor');
            }
        } catch (Exception $e) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to update doctor: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '",
                        icon: "error"
                    }).then(function() {
                        window.location.href = "doclist.php";
                    });
                  </script>';
        } 
    }
} else {
    header("Location: doclist.php");
    exit(); // Always use exit() after header redirection to stop script execution
}
?>

<body>
    <section id="update" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5">
                    <h2 class="display-3 fw-normal text-center">Update <span class="text-primary">Doctor</span></h2>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" id="name" value="<?php echo htmlspecialchars($doctor['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="email" value="<?php echo htmlspecialchars($doctor['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control form-control-lg" name="qualification" id="qualification" value="<?php echo htmlspecialchars($doctor['qualification'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="update_doctor" type="submit" class="btn btn-dark btn-lg rounded-1" value="Update Doctor">
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
