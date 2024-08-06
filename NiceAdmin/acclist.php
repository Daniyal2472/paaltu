<?php
include("header.php");
include("connection.php");
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Accessories Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Accessories</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Accessories</h5>

                        <!-- Accessories Table -->
                        <table class="table">
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
                                $query = mysqli_query($con, "SELECT * FROM accessories");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $imagePath = $row['image']; // Use relative path
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $row['id'] . "</th>";
                                        echo "<td>" . (isset($row['name']) ? $row['name'] : '') . "</td>";
                                        echo "<td>" . (isset($row['price']) ? $row['price'] : '') . "</td>";
                                        echo "<td>" . (isset($row['category_id']) ? $row['category_id'] : '') . "</td>";
                                        echo "<td>" . (isset($row['image']) ? '<img src="' . $imagePath . '" alt="' . $row['name'] . '" width="50">' : '') . "</td>";
                                        echo "<td>" . (isset($row['description']) ? $row['description'] : '') . "</td>";
                                        echo "<td>";
                                        echo "<a href='updateacc.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='deleteacc.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No accessories found</td></tr>";
                                }
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
