<?php
include("header.php");

// Assuming the authorization function is already defined elsewhere
$user = ['role' => $_SESSION['role']]; // Example user data

// Check if the user is allowed to view the user list (only authorized roles can perform this action)
if (!authorize('view_users', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to view this page. Only authorized users can perform this action.</div></div>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* General Table Styling */
        .table {
            border-collapse: collapse;
            width: 100%; /* Adjust as needed */
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
            <div class="col-lg-12"> <!-- Adjust column size to full width -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User List</h5>

                        <!-- User Table -->
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch users from the database using prepared statements
                                $stmt = $con->prepare("SELECT * FROM users");
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<th scope='row'>" . htmlspecialchars($row['id']) . "</th>";
                                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                                        echo "<td>";
                                        echo "<a href='user_update.php?id=" . urlencode($row['id']) . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='user_delete.php?id=" . urlencode($row['id']) . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No users found</td></tr>";
                                }

                                $stmt->close();
                                ?>
                            </tbody>
                        </table>
                        <!-- End User Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

</body>
</html>

<?php
include("footer.php");
?>
