<?php
include("header.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ed = $_GET['id'];
    $ed = mysqli_real_escape_string($con, $ed); // Prevent SQL Injection
    $query = "SELECT * FROM `foods` WHERE id=$ed";
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


<body>
    <style>
        /* Styling for the Add to Cart Button */
.custom-btnnn {
    background-color: #DEAD6F; /* New background color */
    padding: 10px 15px; /* Adjust padding for a smaller button */
    font-size: 14px; /* Smaller font size */
    border-radius: 25px; /* Rounded corners */
    border: none;
    transition: background-color 0.3s;
}

.custom-btnnn:hover {
    background-color: #c59e6b; /* Slightly darker shade for hover effect */
}

/* Smaller Quantity Label */
.text-gray2 {
    font-size: 14px; /* Smaller font size for the quantity label */
    
}
/* Styling for the quantity section */
.quantity-section {
    width: 150px; /* Adjust width as needed */
}

/* Styling for the quantity buttons */
.quantity-left-minus, .quantity-right-plus {
    width: 30px; 
    height: 45px;
    font-size: 20px;
    text-align: center; 
    margin-left: 5px;
    margin-right: 5px;
    
}

/* Styling for the quantity input */
.input-number {
    width: 70px; 
    text-align: center; 
    height: 5px;
    padding-left: 2px;
}
/* Professional and Unique Styling for Name and Price */
.product-title {
    font-size: 2.5rem; /* Larger font size for prominence */
    font-weight: bold; /* Bold text for emphasis */
    color: #2c3e50; /* Darker color for a professional look */
    margin-bottom: 0.5rem; /* Space below the title */
}

.product-price {
    font-size: 1.75rem; /* Slightly smaller font size for price */
    color: #e74c3c; /* Distinct color for price */
    font-weight: bold; /* Bold text for emphasis */
    margin-top: 0.5rem; /* Space above the price */
    display: flex; /* Flexbox for alignment */
    align-items: center; /* Align items vertically */
}

.product-price span {
    font-size: 1.2rem; /* Adjust size for currency symbol */
    margin-right: 0.5rem; /* Space between symbol and amount */
}


    </style>
    <!-- section breadcrumb top   -->
    <!-- home to Pet details -->

    <!-- Pet details -->
    <body>
    <!-- section breadcrumb top   -->
    <!-- home to Pet details -->

    <!-- Pet details -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="shadow-lg ms-5 bgg-gray mt-5 mb-5">
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="img not found" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="me-5 ms-4 pb-2 mt-5 border-bottom">
                <p class="product-title"><?php echo htmlspecialchars($row['name']); ?></p>
                    <p class="product-price">
        <span>PKR</span> <?php echo htmlspecialchars($row['price']); ?>
    </p>
                    <p class="card-text text-yellow small mt-1">
                        <!-- You can add review details here -->
                    </p>
                </div>
                <div class="p-2 ms-4 mt-2">
                    <p class="text-gray2">Quantity:</p>
                    <div class="input-group quantity-section">
    <span class="input-group-btn">
        <button type="button" class="quantity-left-minus btn btn-number custom-btn" data-type="minus" data-field="">
            <span class="glyphicon glyphicon-minus h4">-</span>
        </button>
    </span>
    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
    <span class="input-group-btn">
        <button type="button" class="quantity-right-plus btn btn-number custom-btn" data-type="plus" data-field="">
            <span class="glyphicon glyphicon-plus h4">+</span>
        </button>
    </span>
</div>

                </div>
               
                <div class="ps-4 me-5 pe-5 mt-2 pt-5">
                <input type="button" value="Add to cart" class="form-control p-3 text-white custom-btnnn add-to-cart-button" data-pet-id="<?php echo htmlspecialchars($row['id']); ?>">
                </div>
            </div>
        </div>
    </div>

    <!-- Section description health warranty reviews -->
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                    <div class="mt-5">
                        <div class="pe-4 d-flex border-bottom border-2 me-5">
                            
                            <p class="ps-5">
                                <button id="btn3" class="text-blacks hide-btn border-0 bg-white custom-btnn" type="button">Review(0)</button>
                            </p>
                        </div>
                        
                        
                        <div class="w-100 para-hide" id="form3">
                            <p class="color-B5 pe-5"></p>
                        </div>
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
    });
</script>

    


    <?php
    include("footer.php");
    ?>
