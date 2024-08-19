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
         .icon-hover:hover {
    border-color: #3b71ca !important;
    background-color: white !important;
    color: #3b71ca !important;
  }
  
  .icon-hover:hover i {
    color: #3b71ca !important;
  }
  .section-header {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        
    .input-group {
      display: flex;
      align-items: center; /* Center items vertically */
      width: 170px;
    }

    .input-group .form-control {
      text-align: center;
      height: 60px;
      border-radius: 0; /* Optional: To align with button corners */
      
    }

    .input-group .btn {
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 0; /* Optional: To align with input corners */
    }

    /* Hide arrows for number input */
    input[type="number"] {
      -moz-appearance: textfield; /* Firefox */
      -webkit-appearance: none; /* Safari and Chrome */
      appearance: none; /* Standard */
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none; /* Safari and Chrome */
      margin: 0; /* Remove margin */
    }
    .pl-5{
        padding-left: 10px;
    }
    .btn-buy-now {
    margin-top: 50px; /* Adjust the value as needed */
}

    

    </style>
    <!-- section breadcrumb top   -->
    <!-- home to Pet details -->

    <!-- Pet details -->
    <section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image">
              <img style="max-width: 100%; max-height: 60vh; margin: auto;" class="rounded-4 fit" src="<?php echo htmlspecialchars($row['image']); ?>" />
            </a>
          </div>
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
            <?php echo htmlspecialchars($row['name']); ?>
            </h4>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
              <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <span class="ms-1 text-dark">
                  4.5
                </span>
              </div>
             
              <span class="text-success ms-2 text-dark">In stock</span>
            </div>
  
            <div class="mb-3">
              <span class="h5">PKR: <?php echo htmlspecialchars($row['price']); ?></span>
              
            </div>
            <p>
            <?php echo htmlspecialchars($row['description']); ?>
            </p>

            
            
  
            
  
            <div class="row">
              <dt class="col-3">Weight:</dt>
              <dd class="col-9"><?php echo htmlspecialchars($row['weight']); ?></dd>
            </div>
  
            <hr />
            <?php
$type = 'foods'; // Set based on your context; e.g., from a database or logic
?>

<a href="product_page.php?id=<?php echo $row['id']; ?>&type=<?php echo $type; ?>" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Buy Now </a>

            
          </div>
        </main>
      </div>
    </div>
    </section>

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