<?php
include("header.php");


// Example user data
$user = ['role' => $_SESSION['role']];

// Check if the user is allowed to view doctors (only admins can view doctors)
if (!authorize('view_doctors', $user)) {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center col-6" role="alert">You are not authorized to view this page. Only admins can perform this action.</div></div>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* General Table Styling */
        .table {
            border-collapse: collapse;
            width: 100%; /* Adjust this as needed */
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
                        <h5 class="card-title">Doctors List</h5>

                        <!-- Doctors Table -->
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Qualification</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch doctor details from the database using prepared statements
                                $fetchDoctorsStmt = $con->prepare("SELECT * FROM doctors");
                                $fetchDoctorsStmt->execute();
                                $result = $fetchDoctorsStmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<th scope='row'>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</th>";
                                        echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['qualification'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>";
                                        echo "<a href='doc_update.php?id=" . urlencode($row['id']) . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='doc_delete.php?id=" . urlencode($row['id']) . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No doctors found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Doctors Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

</body>
</html>
