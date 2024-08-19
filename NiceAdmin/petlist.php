<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to add a new pet (only admins can add pets)
if (!authorize('view_pet', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update this pet.Only admins can perform this action.</div></div>';
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
                        <h5 class="card-title">Pets List</h5>

                        <!-- Pets Table -->
                        <table class="table" id="myTable">
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
                                $query = mysqli_query($con, "SELECT * FROM `pets`");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $imagePath = $row['image']; // Use relative path
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $row['id'] . "</th>";
                                        echo "<td>" . (isset($row['user_id']) ? $row['user_id'] : '') . "</td>";
                                        echo "<td>" . (isset($row['name']) ? $row['name'] : '') . "</td>";
                                        echo "<td>" . (isset($row['category_id']) ? $row['category_id'] : '') . "</td>";
                                        echo "<td>" . (isset($row['breed']) ? $row['breed'] : '') . "</td>";
                                        echo "<td>" . (isset($row['price']) ? $row['price'] : '') . "</td>";
                                        echo "<td>" . (isset($row['age']) ? $row['age'] : '') . "</td>";
                                        echo "<td>" . (isset($row['description']) ? $row['description'] : '') . "</td>";
                                        echo "<td>" . (isset($row['image']) ? '<img src="' . $imagePath . '" alt="' . $row['name'] . '" width="50">' : '') . "</td>";
                                        echo "<td>";
                                        echo "<a href='pet_update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='pet_delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='10'>No pets found</td></tr>";
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
mysqli_close($con);
?>

</body>
</html>



<!-- 
<?php
// Close the database connection
mysqli_close($con);
?> -->

