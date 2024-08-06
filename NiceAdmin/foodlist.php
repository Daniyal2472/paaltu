<?php
include("header.php");
include("connection.php");
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Foods Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Foods</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Foods</h5>

                        <!-- Foods Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM foods");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $imagePath = $row['image']; // Use relative path
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $row['id'] . "</th>";
                                        echo "<td>" . (isset($row['name']) ? $row['name'] : '') . "</td>";
                                        echo "<td>" . (isset($row['category_id']) ? $row['category_id'] : '') . "</td>";
                                        echo "<td>" . (isset($row['image']) ? '<img src="' . $imagePath . '" alt="' . $row['name'] . '" width="50">' : '') . "</td>";
                                        echo "<td>" . (isset($row['weight']) ? $row['weight'] : '') . "</td>";
                                        echo "<td>" . (isset($row['quantity']) ? $row['quantity'] : '') . "</td>";
                                        echo "<td>";
                                        echo "<a href='food_update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='food_delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No foods found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Foods Table -->
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php
include("footer.php");
?>
