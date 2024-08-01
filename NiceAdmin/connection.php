<?php
include("header.php");

// Database connection
$con = mysqli_connect("localhost", "root", "", "paaltu");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>

