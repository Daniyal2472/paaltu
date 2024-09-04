<?php
include 'header.php';

if (isset($_POST['delete'])) {
    $pet_id = intval($_POST['pet_id']);
    // Perform the delete operation
    $deleteQuery = "DELETE FROM `pets` WHERE `id` = $pet_id";
    if (mysqli_query($con, $deleteQuery)) {
        echo "<script>
                swal({
                    title: 'Deleted!',
                    text: 'Your pet has been deleted.',
                    icon: 'success',
                    buttons: {
                        confirm: {
                            className: 'btn btn-success',
                        },
                    },
                });
              </script>";
    } else {
        echo "<script>
                swal({
                    title: 'Error!',
                    text: 'There was an error deleting the pet.',
                    icon: 'error',
                    buttons: {
                        confirm: {
                            className: 'btn btn-danger',
                        },
                    },
                });
              </script>";
    }
}

?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Pets Management</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Pets</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Pets</h4>
                            <button
    class="btn btn-primary btn-round ms-auto"
    onclick="window.location.href='add_pet.php';"
>
    <i class="fa fa-plus"></i>
    Add Pet
</button>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>Username</th>
                                        <th>Pet Name</th>
                                        <th>Category</th>
                                        <th>Breed</th>
                                        <th>Age</th>
                                        <th>Description</th>
                                        <th>Vaccination Status</th>
                                        <th>Image</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>#</th>
                                        <th>Username</th>
                                        <th>Pet Name</th>
                                        <th>Category</th>
                                        <th>Breed</th>
                                        <th>Age</th>
                                        <th>Description</th>
                                        <th>Vaccination Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $result = mysqli_query($con, "SELECT * FROM `pets`");
                                    $count = 1;
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($count) . '</td>';
                                            // Fetch the user name
                                            $userQuery = mysqli_query($con, "SELECT `name` FROM `users` WHERE `id` = " . $row['user_id']);
                                            if ($userRow = mysqli_fetch_assoc($userQuery)) {
                                                echo '<td>' . htmlspecialchars($userRow['name']) . '</td>';
                                            } else {
                                                echo '<td>Unknown Category</td>'; // Fallback if category not found
                                            }

                                            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                            // Fetch the category name
                                            $categoryQuery = mysqli_query($con, "SELECT `name` FROM `categories` WHERE `id` = " . $row['category_id']);
                                            if ($categoryRow = mysqli_fetch_assoc($categoryQuery)) {
                                                echo '<td>' . htmlspecialchars($categoryRow['name']) . '</td>';
                                            } else {
                                                echo '<td>Unknown Category</td>'; // Fallback if category not found
                                            }
                                            echo '<td>' . htmlspecialchars($row['breed']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['age']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['description']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['vaccination_status']) . '</td>';
                                            echo '<td><img src="uploads/' . htmlspecialchars($row['image']) . '" width="100" height="100" /></td>';
                                            echo '<td>
    <div class="form-button-action">
        <a href="edit_pet.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-link btn-primary btn-lg">
            <i class="fa fa-edit"></i>
        </a>
        <button type="button" onclick="confirmDelete(' . $row['id'] . ')" class="btn btn-link btn-danger">
            <i class="fa fa-times"></i>
        </button>
    </div>
</td>';

                                            echo '</tr>';
                                            $count++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hidden delete form -->
<form id="deleteForm" method="post" style="display: none;">
    <input type="hidden" name="pet_id" id="pet_id">
    <input type="hidden" name="delete" value="delete">
</form>

<?php
include 'footer.php';
?>
<script>
function confirmDelete(id) {
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        buttons: {
            confirm: {
                text: "Yes, delete it!",
                className: "btn btn-success",
            },
            cancel: {
                visible: true,
                className: "btn btn-danger",
            },
        },
    }).then((willDelete) => {
        if (willDelete) {
            // Set the pet_id value in the hidden form
            document.getElementById('pet_id').value = id;

            // Submit the form
            document.getElementById('deleteForm').submit();
        } else {
            swal.close();
        }
    });
}
</script>
<script>
    // Add Row
    $("#add-row").DataTable({
          pageLength: 5,
        });

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
</script>
