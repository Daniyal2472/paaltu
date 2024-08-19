<?php
include("header.php");

$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to add a new user (only admins can add users)
if (!authorize('create_users', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to add users. Only admins can perform this action.</div></div>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <!-- Add your CSS links here -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert2 library -->
</head>
<body>
    <section id="register" style="background: url('images/background-img.png') no-repeat;">
        <div class="container">
            <div class="row my-5 py-5 mt-0 mb-0">
                <div class="offset-md-3 col-md-6 my-5 text-center">
                    <div class="text-center">
                        <div class="main-logo">
                            <a href="index.php">
                                <img src="../NiceAdmin/assets/img/paltoo.png" alt="logo" class="img-fluid logo-img" style="height: 120px; width: auto;">
                            </a>
                        </div>
                    </div>
                    <h6 class="display-5 fw-normal text-center mt-2"> 
                        <span class="text-black">ADD USER</span>
                    </h6>
                    <form method="post" action="" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Enter Your Full Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter Your Email Address" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-lg" name="password" id="password1" placeholder="Create Password" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-lg" name="password2" id="password2" placeholder="Repeat Password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input name="signup" type="submit" class="btn btn-dark btn-lg rounded-1" value="Add User">
                        </div>
                    </form>
                    <!-- Display success or error message -->
                    <?php if (isset($message)) { echo "<div class='alert alert-success'>$message</div>"; } ?>
                </div>
            </div>
        </div>
    </section>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password1 = document.getElementById("password1").value;
            var password2 = document.getElementById("password2").value;

            if (username === "" || email === "" || password1 === "" || password2 === "") {
                alert("All fields must be filled out");
                return false;
            }

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }

            if (password1 !== password2) {
                alert("Passwords do not match");
                return false;
            }

            if (password1.length < 6) {
                alert("Password must be at least 6 characters long");
                return false;
            }

            return true;
        }
    </script>

</body>
</html>

<?php

if (isset($_POST['signup'])) {
    // Retrieve and sanitize input data
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Password should be hashed

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Database connection
    $con = mysqli_connect("localhost", "username", "password", "database");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Prepare and bind parameters for the SQL query
    $stmt = $con->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'User')");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    // Execute the prepared statement and check the result
    if ($stmt->execute()) {
        $_SESSION['status'] = "User registered successfully!";
        echo '<script>
            Swal.fire({
                title: "Good job!",
                text: "User registered successfully!",
                icon: "success"
            }).then(function() {
                window.location.href = "acclist.php";
            });
        </script>';
        unset($_SESSION['status']);
    } else {
        $message = "Error in registration: " . $stmt->error;
    }

    $stmt->close();
}
?>
