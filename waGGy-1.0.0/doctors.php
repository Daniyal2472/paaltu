<?php
include("header.php");

// Fetch doctors from the database
$doctor_query = mysqli_query($con, "SELECT * FROM `doctors`"); // Adjust the SQL query to match your table structure
?>

<body>
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
            <h1 class="mb-0">Professional doctors   </h1>
        </div>
        <div class="row g-5">
            <?php
            // Check if there are any doctors to display
            if (mysqli_num_rows($doctor_query) > 0) {
                while ($doctor = mysqli_fetch_assoc($doctor_query)) {
                    $name = htmlspecialchars($doctor['name']);
                    $qualification = htmlspecialchars($doctor['qualification']);
                    $image = htmlspecialchars($doctor['image']); // Assuming 'image' column contains image file name
                    ?>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="../doctors/<?php echo $image; ?>" alt="<?php echo $name; ?>">
                            </div>
                            <div class="text-center py-4">
                                <h4 class="text-primary"><?php echo $name; ?></h4>
                                <p class="text-uppercase m-0"><?php echo $qualification; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No team members found.</p>";
            }
            ?>
        </div>
    </div>
</div>

<section class="bg-gray-light" id="info" style="background: url('images/background-img.png') no-repeat;">
    <section class="container-fluid pb-5 pt-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <p class="h1 text-bg">OUR VETERINARY SERVICES</p>
                </div>
            </div>
            <section id="categories">
                <div class="container my-3 py-5">
                    <div class="row my-5">
                        <div class="col text-center">
                            <a href="" class="categories-item">
                                <img src="images/m1.png" alt="Diagnostic Testing" class="iconss mb-3">
                                <h5>Diagnostic Testing</h5>
                            </a>
                        </div>
                        <div class="col text-center">
                            <a href="" class="categories-item">
                                <img src="images/m5.png" alt="Vaccinations" class="iconss mb-3">
                                <h5>Vaccinations</h5>
                            </a>
                        </div>
                        <div class="col text-center">
                            <a href="" class="categories-item">
                                <img src="images/m2.png" alt="Wellness Screening" class="iconss mb-3">
                                <h5>Wellness Screening</h5>
                            </a>
                        </div>
                        <div class="col text-center">
                            <a href="" class="categories-item">
                                <img src="images/m3.png" alt="Dental Care" class="iconss mb-3">
                                <h5>Dental Care</h5>
                            </a>
                        </div>
                        <div class="col text-center">
                            <a href="" class="categories-item">
                                <img src="images/m4.png" alt="Surgery and Anesthesia" class="iconss mb-3">
                                <h5>Surgery and Anesthesia</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>

<?php
include("footer.php");
?>
</body>
