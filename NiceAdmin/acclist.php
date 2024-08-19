<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to view the accessory list (only authorized users can view accessories)
if (!authorize('view_accessory', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to view this page. Only admins can perform this action.</div></div>';
    exit;
}
?>

<style>
    /* Include the same CSS styles as above */
    .table {
        border-collapse: collapse;
        width: 100%;
        margin: 20px 0;
        font-size: 1rem;
        color: #333;
    }

    .table thead th {
        background-color: #f4f4f4;
        color: #333;
        padding: 12px;
        text-align: left;
        border-bottom: 2px solid #ddd;
    }

    .table tbody tr {
        border-bottom: 1px solid #ddd;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody td {
        padding: 12px;
    }

    .table tbody td a {
        text-decoration: none;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 0.875rem;
        font-weight: 600;
        border-radius: 5px;
        text-align: center;
        color: black;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
        transform: translateY(-2px);
    }

    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    .pagetitle {
        margin-bottom: 20px;
    }
</style>

<body>

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Accessories List</h5>

                        <!-- Accessories Table -->
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Prepare the SQL statement
                                $stmt = $con->prepare("SELECT * FROM accessories");
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $imagePath = $row['image']; // Use relative path
                                        echo "<tr>";
                                        echo "<th scope='row'>" . htmlspecialchars($row['id']) . "</th>";
                                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['category_id']) . "</td>";
                                        echo "<td>" . (isset($row['image']) ? '<img src="' . htmlspecialchars($imagePath) . '" alt="' . htmlspecialchars($row['name']) . '" width="50">' : '') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                        echo "<td>";
                                        echo "<a href='updateacc.php?id=" . urlencode($row['id']) . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='deleteacc.php?id=" . urlencode($row['id']) . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No accessories found</td></tr>";
                                }

                                // Close the statement
                                $stmt->close();
                                ?>
                            </tbody>
                        </table>
                        <!-- End Accessories Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php
include("footer.php");
?>
</body>
</html>
