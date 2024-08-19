<?php
include("header.php");
?>

<body>
<section id="foodies" class="my-5">
    <div class="container my-5 py-5">
        <div class="section-header text-center"> <!-- Add text-center class -->
            <h2 class="display-3 fw-normal">Pets Food</h2>
        </div>
        
        <div class="isotope-container row">
            <?php
            // Updated query to fetch all data from the 'foods' table
            $query = "SELECT * FROM `foods`";
            $result = mysqli_query($con, $query);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Fetch user details
                    $user_id = $row['user_id'];
                    $userQuery = "SELECT * FROM `users` WHERE id='$user_id'";
                    $userResult = mysqli_query($con, $userQuery);
                    $userRow = mysqli_fetch_assoc($userResult);
            ?>
            <div class="item cat col-md-4 col-lg-3 my-4">
                <div class="card position-relative">
                    <a href="food_detail.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['image']; ?>" class="img-fluid rounded-4" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    </a>
                    <div class="card-body p-0">
                        <a href="food_detail.php?id=<?php echo $row['id']; ?>">
                            <h3 class="card-title pt-4 m-0"><?php echo htmlspecialchars($row['name']); ?></h3>
                        </a>
                        
                        <div class="card-text">
                            <?php
                            if ($userRow) {
                                if ($userRow['role'] === "Admin") {
                            ?>
                                <span class="rating secondary-font">
                                    Verified By Paaltoo
                                    <iconify-icon icon="mdi:check-circle" class="text-primary"></iconify-icon> <!-- Verified icon -->
                                </span>
                            <?php
                                } else {
                            ?>
                                <span class="rating secondary-font">
                                    <?php echo htmlspecialchars($userRow['name']); ?>
                                </span>
                            <?php
                                }
                            } else {
                                echo "Unknown User";
                            }
                            ?>
                            <h3 class="secondary-font text-primary">PKR:  <?php echo htmlspecialchars($row['price']); ?></h3>
                            <div class="d-flex flex-wrap mt-3">
                                <a href="food_detail.php?id=<?php echo $row['id']; ?>" class="btn-cart me-3 px-4 pt-3 pb-3">
                                    <h5 class="text-uppercase m-0">Buy Now</h5>
                                </a>
                                <!-- <a href="#" class="btn-wishlist px-4 pt-3">
                                    <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>
</body>
