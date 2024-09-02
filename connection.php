<?php
include('policies.php');
session_start(); // Ensure session is started

$host = "localhost";
$username = "root";
$password = "";
$database = "paaltu";

// Create a connection
$con = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (mysqli_connect_errno()) {
    $alertMessage = "Database connection failed: " . mysqli_connect_error();
    echo "<script>alert('$alertMessage');</script>";
    exit(); // Exit script if connection fails
}

// Login code
if (isset($_POST['signin'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Use prepared statements to avoid SQL injection
        $stmt = $con->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();

                // Verify password
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];

                    if ($user['role'] == 'Admin') {
                        header("Location: NiceAdmin/admin_welcom.php");
                    } else {
                        include 'session.php'; // Include the session initialization file
                        header("Location: waGGy-1.0.0/index.php");
                    }
                } else {
                    echo "<script>alert('Invalid email or password. Please try again.');</script>";
                }
            } else {
                echo "<script>alert('Invalid email or password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Error in query.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Email and password are required.');</script>";
    }
}
?>
