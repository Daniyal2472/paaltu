<?php
include("header.php");
include("connection.php");
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>General Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">  
                    <div class="card-body">
                        <h5 class="card-title">contact Table</h5>

                        <!-- Categories Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM contact");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $row['id'] . "</th>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['message'] . "</td>";


                                        echo "<td>";
                                        echo "<a href='updatecat.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Update</a> ";
                                        echo "<a href='deletecat.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No categories found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Categories Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php
include("footer.php");
?>
