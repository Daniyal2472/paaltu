<?php
include("header.php");
include("connection.php");
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
                        <h5 class="card-title">Pets</h5>

                        <!-- Pets Table -->
                        <table class="table">
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
                                $query = mysqli_query($con, "SELECT * FROM pets");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $imagePath = '../accessories/' . (isset($row['image']) ? $row['image'] : '');
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $row['id'] . "</th>";
                                        echo "<td>" . (isset($row['user_id']) ? $row['user_id'] : '') . "</td>";
                                        echo "<td>" . (isset($row['name']) ? $row['name'] : '') . "</td>";
                                        echo "<td>" . (isset($row['category_id']) ? $row['category_id'] : '') . "</td>";
                                        echo "<td>" . (isset($row['breed']) ? $row['breed'] : '') . "</td>";
                                        echo "<td>" . (isset($row['price']) ? $row['price'] : '') . "</td>";
                                        echo "<td>" . (isset($row['age']) ? $row['age'] : '') . "</td>";
                                        echo "<td>" . (isset($row['description']) ? $row['description'] : '') . "</td>";
                                        echo "<td><img src='" . $imagePath . "' alt='Pet Image' style='width: 100px; height: auto;'></td>";
                                        echo "<td>" . (isset($row['role']) ? $row['role'] : '') . "</td>";
                                        echo "<td>";
                                        echo "<a href='seller_update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='seller_delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='11'>No pets found</td></tr>";
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
