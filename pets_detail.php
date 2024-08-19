<?php
include("header.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ed = intval($_GET['id']); // Convert to integer to prevent SQL injection
    $ed = mysqli_real_escape_string($con, $ed);

    $query = "SELECT * FROM `pets` WHERE id=$ed";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con) . "<br>SQL Query: " . $query); // Display SQL error and query
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("No records found for ID: $ed"); // Display message if no records are found
    }
} else {
    die("Invalid ID parameter.");
}
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
    }
    .container-fluid {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-top: 30px;
        padding: 20px;
    }
    .product-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 0.5rem;
    }
    .product-price {
        font-size: 1.75rem;
        color: #e74c3c;
        font-weight: 700;
        display: flex;
        align-items: center;
    }
    .product-price span {
        font-size: 1.2rem;
        margin-right: 0.5rem;
    }
    .custom-btnnn {
        background-color: #000;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 25px;
        border: none;
        color: #fff;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .custom-btnnn:hover {
        background-color: #DEAD6F;
    }
    .custom-btnnn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.3);
    }
    .custom-btnnn:active {
        background-color: #DEAD6F;
        transform: scale(0.98);
    }
    .input-group {
        display: flex;
        align-items: center;
    }
    .quantity-section {
        display: flex;
        align-items: center;
    }
    .quantity-left-minus, .quantity-right-plus {
        width: 40px;
        height: 40px;
        font-size: 20px;
        text-align: center;
        cursor: pointer;
        background-color: #e0e0e0;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 0 5px;
    }
    .input-number {
        width: 60px;
        text-align: center;
        height: 40px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .section-header {
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }
    .description-content, .health-care-content, .review-content {
        display: none;
    }
    .active {
        display: block;
    }
</style>
</head>
<body>

    <!-- Pet details -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="shadow-lg">
                    <img src="<?php echo htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Pet Image" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-md-6">
                <div class="ms-4">
                    <p class="product-title"><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="product-price">
                        <span>PKR</span> <?php echo htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    <p class="card-text text-gray mt-1">
                        <!-- You can add review details here -->
                    </p>
                </div>
               
                <div class="text-center mt-4">
                    <a href="product_page.php?id=<?php echo $row['id'] ?>" class="custom-btnnn">
                        <h4 class="m-0 p-2">Buy Now</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Section description health warranty reviews -->
    <section class="mt-5">
        <div class="container">
            <div class="section-header">Details</div>
            <div class="row">
                <div class="col-md-8">
                    <div class="description-content active" id="description">
                        <p><strong>Breed:</strong> <?php echo htmlspecialchars($row['breed'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Color:</strong> <?php echo htmlspecialchars($row['color'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Weight:</strong> <?php echo htmlspecialchars($row['weight'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Height:</strong> <?php echo htmlspecialchars($row['height'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Age:</strong> <?php echo htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['gender'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Vaccination Status:</strong> <?php echo htmlspecialchars($row['vaccination_status'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Temperament:</strong> <?php echo htmlspecialchars($row['temperament'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Good with Children:</strong> <?php echo htmlspecialchars($row['good_with_children'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Good with Other Pets:</strong> <?php echo htmlspecialchars($row['good_with_other_pets'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="health-care-content" id="health-care">
                        <p><strong>Health Check:</strong> Comprehensive health check included</p>
                        <p><strong>Vaccination:</strong> Fully vaccinated</p>
                        <p><strong>Microchipping:</strong> Included</p>
                    </div>
                    <div class="review-content" id="review">
                        <p>No reviews yet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // JavaScript to handle the quantity increase and decrease
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity');
            const btnMinus = document.querySelector('.quantity-left-minus');
            const btnPlus = document.querySelector('.quantity-right-plus');

            if (btnMinus && btnPlus && quantityInput) {
                // Handle click event for minus button
                btnMinus.addEventListener('click', function() {
                    let currentValue = parseInt(quantityInput.value, 10);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                    }
                });

                // Handle click event for plus button
                btnPlus.addEventListener('click', function() {
                    let currentValue = parseInt(quantityInput.value, 10);
                    quantityInput.value = currentValue + 1;
                });
            }
        });

        // JavaScript to handle the tab navigation
        document.querySelectorAll('.section-header button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.section-header button').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.description-content, .health-care-content, .review-content').forEach(section => section.classList.remove('active'));
                
                this.classList.add('active');
                document.getElementById(this.getAttribute('data-target')).classList.add('active');
            });
        });
    </script>

    <?php include("footer.php"); ?>

</body>
</html>
