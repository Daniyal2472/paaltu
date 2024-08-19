<?php
// Start output buffering
ob_start();

// Ensure the session is started to access session variables
include("header.php");

// Check if the database connection is included in header.php
// include("db_connection.php");

$type = isset($_GET['type']) ? mysqli_real_escape_string($con, $_GET['type']) : '';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ed = $_GET['id'];
    $user_id = $_SESSION['user_id'];
 //   $id = $_SESSION['ed'];
    
    $ed = mysqli_real_escape_string($con, $ed); // Prevent SQL Injection

    if ($type == 'pets') {
        $query = "SELECT * FROM `pets` WHERE id='$ed'";
    } elseif ($type == 'foods') {
        $query = "SELECT * FROM `foods` WHERE id='$ed'";
    } elseif ($type == 'accessory') {
        $query = "SELECT * FROM `accessories` WHERE id='$ed'";
    } else {
        die("Invalid type provided.");
    }

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    // if ($result) {
    //     // Redirect to confirmation.html on successful query
    //     header("Location: confirmation.html");
    //     exit(); // Ensure no further code is executed after redirection
    // } else {
    //     die("Query failed: " . mysqli_error($con) . "<br>SQL Query: " . $query); // Display SQL error and query
    // }
} else {
    echo "Invalid ID or ID not set";
}

// End output buffering and flush output
ob_end_flush();
?>



        <style>
        
        .heading {
    font-size: 2rem;
    color: black;
    text-align: center; /* Center the text horizontally */
    margin-bottom: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold; /* Make the heading bold */
}

.product-image-container {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically (if container height is set) */
    margin-bottom: 20px;
    width: 100%; /* Ensure it uses the full width of the parent */
}

.product-image {
    max-width: 40%; /* Decrease the image size */
    height: auto; /* Maintain aspect ratio */
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.product-info, .order-summary, .payment-methods {
    background: #F2F2F2; /* New light gray background color */
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    text-align: center; /* Center the text horizontally */
}

.product-info h2, .order-summary h3 {
    font-size: 1.8rem;
    color: #333; /* Dark gray text color */
    margin-bottom: 15px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.order-summary h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
}

.product-info p, .order-summary p {
    font-size: 1.2rem;
    color: #666; /* Medium gray text color */
    margin-bottom: 10px;
}

.payment-methods h3 {
    font-size: 1.5rem;
    color: #333; /* Dark gray text color */
    margin-bottom: 15px;
}

.form-check {
    margin-bottom: 10px;
    display: flex;
    justify-content: center; /* Center the form checks horizontally */
    align-items: center;
}

.form-check-input {
    margin-right: 10px;
    accent-color: #DEAD6F;
    width: 20px;
    height: 20px;
}

.form-check-label {
    font-size: 1.2rem;
    color: #333;
    display: flex;
    align-items: center;
}

.pay-now-button {
    background-color: black;
    color: #fff;
    border: none;
    padding: 15px 20px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 1.2rem;
    transition: background-color 0.3s ease, transform 0.3s ease;
    display: block;
    margin: 0 auto; /* Center the button */
}

.pay-now-button:hover {
    background-color: #bfa26b;
    transform: scale(1.05);
}

        </style>
    </head>
    <body>
    <div class="container">
    <div class="heading">Product Purchase</div>
    <div class="product-image-container">
        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image" class="product-image">
    </div>
    
    <div class="product-info">
        <h2><?php echo htmlspecialchars($row['name']); ?></h2>
        <p><strong>Price:</strong> PKR <?php echo htmlspecialchars($row['price']); ?></p>
    </div>
    <div class="payment-methods">
        <h3>Select Payment Method</h3>
        <form action="order.php?id=<?php echo $row['id']?>&type=<?php echo $type ?>" method="POST">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" id="paymentMethod1" value="credit_card">
                <label class="form-check-label" for="paymentMethod1">Credit Card</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" id="paymentMethod2" value="paypal">
                <label class="form-check-label" for="paymentMethod2">PayPal</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" id="paymentMethod3" value="bank_transfer">
                <label class="form-check-label" for="paymentMethod3">Bank Transfer</label>
            </div>
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <button  type="submit" class="pay-now-button">Pay Now</button>
        </form>
    </div>
</div>

    </body>
    </html>