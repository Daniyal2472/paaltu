<?php
include("header.php");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Initialize variables
$searchTerm = '';
$results = [];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    // Get the search term from the form input
    $searchTerm = $_POST['searchTerm'];

    // Prepare and execute the SQL query
    if ($stmt = $con->prepare("SELECT * FROM pets WHERE name LIKE ?")) {
        $searchTermParam = "%" . $searchTerm . "%";
        $stmt->bind_param("s", $searchTermParam);
        $stmt->execute();
        
        // Get the results
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Failed to prepare SQL statement.";
    }
}

// Close the connection
$con->close();
?>
<?php if ($searchTerm): ?>
    <h2 class="text-center pt-5">Results for "<?php echo htmlspecialchars($searchTerm); ?>"</h2>
    <?php if (count($results) > 0): ?>
        <div class="row">
            <?php foreach ($results as $row): ?>
                <div class="item cat col-md-4 col-lg-3 my-4">
                    <div class="card position-relative me-3 px-4 pt-3 pb-3">
                        <a href="filter1.php?id=<?php echo $row['id'] ?>">
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" class="img-fluid rounded-4" alt="<?php echo htmlspecialchars($row['name']); ?>">
                        </a>
                        <div class="card-body p-0 ">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0"><?php echo htmlspecialchars($row['name']); ?></h3>
                            </a>
                            <div class="card-text">
                                <h3 class="secondary-font text-primary">PKR.<?php echo htmlspecialchars($row['price']); ?></h3>
                                <div class="d-flex flex-wrap justify-content-center mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-3 pt-3">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center">No products found.</p>
    <?php endif; ?>
<?php endif; ?>

<?php
include('footer.php');
?>
