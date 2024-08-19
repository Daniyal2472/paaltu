<?php
include("header.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$user_id = intval($_SESSION['user_id']); // Ensure user_id is an integer

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pets Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Pets</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pets Table</h5>

                        <!-- Pets Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                // Use prepared statements to prevent SQL injection
                                $query = "SELECT * FROM pets WHERE user_id = ?";
                                $stmt = $con->prepare($query);
                                $stmt->bind_param("i", $user_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $imagePath = htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8'); // Escape image path
                                        echo "<tr>";
                                        echo "<th scope='row'>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</th>";
                                        echo "<td>" . htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['category_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['breed'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . (!empty($imagePath) ? '<img src="' . $imagePath . '" alt="' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '" width="50">' : '') . "</td>";
                                        echo "<td>";
                                        echo "<a href='pet_update.php?id=" . urlencode($row['id']) . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='pet_delete.php?id=" . urlencode($row['id']) . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='10'>No pets found</td></tr>";
                                }
                                $stmt->close();
                            ?>
                            </tbody>
                        </table>
                        <!-- End Pets Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php
include("footer.php");
?>
