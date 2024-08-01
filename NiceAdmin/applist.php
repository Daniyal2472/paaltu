<?php
include("header.php");
include("connection.php");
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Appointments Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
                        <h5 class="card-title">Appointments</h5>

                        <!-- Appointments Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Postal Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM appointments");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $row['id'] . "</th>";
                                        echo "<td>" . (isset($row['name']) ? $row['name'] : '') . "</td>";
                                        echo "<td>" . (isset($row['phone']) ? $row['phone'] : '') . "</td>";
                                        echo "<td>" . (isset($row['email']) ? $row['email'] : '') . "</td>";
                                        echo "<td>" . (isset($row['date']) ? $row['date'] : '') . "</td>";
                                        echo "<td>" . (isset($row['time']) ? $row['time'] : '') . "</td>";
                                        echo "<td>" . (isset($row['city']) ? $row['city'] : '') . "</td>";
                                        echo "<td>" . (isset($row['area']) ? $row['area'] : '') . "</td>";
                                        echo "<td>" . (isset($row['state']) ? $row['state'] : '') . "</td>";
                                        echo "<td>" . (isset($row['postal_code']) ? $row['postal_code'] : '') . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='10'>No appointments found</td></tr>";
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
