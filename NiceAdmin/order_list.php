<?php
include("header.php");
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to add a new pet (only admins can add pets)
if (!authorize('view_order', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to update this pet.Only admins can perform this action.</div></div>';
    exit;
}
?>



<style>
    /* General Table Styling */
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

    /* Button Styling */
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

    /* Card Styling */
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
</head>
<body>

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Orders List</h5>

                        <!-- Orders Table -->
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Order Type</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Include database connection
                               

                                // Query to get accessory orders
                                $query_accessory = mysqli_query($con, "SELECT 'Accessories' AS order_type, id AS order_id, user_id, product_id, time FROM accessory_orders");

                                // Query to get pet orders
                                $query_pet = mysqli_query($con, "SELECT 'pets' AS order_type, id AS order_id, user_id, product_id, time FROM pet_orders");

                                // Query to get food orders
                                $query_food = mysqli_query($con, "SELECT 'foods' AS order_type, id AS order_id, user_id, product_id, time FROM food_orders");

                                // Combine all results
                                $orders = array_merge(
                                    mysqli_fetch_all($query_accessory, MYSQLI_ASSOC),
                                    mysqli_fetch_all($query_pet, MYSQLI_ASSOC),
                                    mysqli_fetch_all($query_food, MYSQLI_ASSOC)
                                );

                                if (!empty($orders)) {
                                    foreach ($orders as $order) {
                                        echo "<tr>";
                                        echo "<th scope='row'>" . htmlspecialchars($order['order_id']) . "</th>";
                                        echo "<td>" . htmlspecialchars($order['order_type']) . "</td>";
                                        echo "<td>" . htmlspecialchars($order['order_id']) . "</td>";
                                        echo "<td>" . htmlspecialchars($order['user_id']) . "</td>";
                                        echo "<td>" . htmlspecialchars($order['product_id']) . "</td>";
                                        echo "<td>" . htmlspecialchars($order['time']) . "</td>";
                                        echo "<td>";
                                        echo "<a href='order_update.php?type=" . urlencode($order['order_type']) . "&id=" . urlencode($order['order_id']) . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='order_delete.php?type=" . urlencode($order['order_type']) . "&id=" . urlencode($order['order_id']) . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No orders found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Orders Table -->
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
