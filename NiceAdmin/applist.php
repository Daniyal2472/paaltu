<?php
include("header.php");
include("connection.php");
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Appointments Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Appointments</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Appointments Table</h5>

                        <!-- Appointments Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Doctor</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM appointments");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $row['id'] . "</th>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['time'] . "</td>";
                                        echo "<td>" . $row['client'] . "</td>";
                                        echo "<td>" . $row['doctor'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='app_update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='app_delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No appointments found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Appointments Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php
include("footer.php");
?>
