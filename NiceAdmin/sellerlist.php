<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to view the pets list (only admins or authorized users can view the list)
if (!authorize('view_seller', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to view this page. Only admins can perform this action.</div></div>';
    exit;
}
?>

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pets</h5>

                        <!-- Pets Table -->
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category ID</th>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Prepare and execute the query
                                $query = "SELECT * FROM pets";
                                if ($stmt = $con->prepare($query)) {
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $imagePath = '../accessories/' . htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8');
                                            echo "<tr>";
                                            echo "<th scope='row'>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</th>";
                                            echo "<td>" . htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                                            echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
                                            echo "<td>" . htmlspecialchars($row['category_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                                            echo "<td>" . htmlspecialchars($row['breed'], ENT_QUOTES, 'UTF-8') . "</td>";
                                            echo "<td>" . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . "</td>";
                                            echo "<td>" . htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8') . "</td>";
                                            echo "<td>" . htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') . "</td>";
                                            echo "<td><img src='" . $imagePath . "' alt='Pet Image' style='width: 100px; height: auto;'></td>";
                                            echo "<td>" . htmlspecialchars($row['role'], ENT_QUOTES, 'UTF-8') . "</td>";
                                            echo "<td>";
                                            echo "<a href='seller_update.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' class='btn btn-primary btn-sm'>Update</a> ";
                                            echo "<a href='seller_delete.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' class='btn btn-danger btn-sm'>Delete</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='11'>No pets found</td></tr>";
                                    }
                                    $stmt->close();
                                } else {
                                    echo "<tr><td colspan='11'>Error fetching data</td></tr>";
                                }
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
