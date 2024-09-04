<?php
include 'header.php';

if (isset($_POST['delete'])) {
    $doc_id = intval($_POST['doc_id']);
    // Perform the delete operation
    $deleteQuery = "DELETE FROM `doctors` WHERE `id` = $doc_id";
    if (mysqli_query($con, $deleteQuery)) {
        echo "<script>
                swal({
                    title: 'Deleted!',
                    text: 'Doctor has been deleted.',
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
                    text: 'There was an error deleting the doctor.',
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

if (isset($_POST['add_doctor'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $qualification = mysqli_real_escape_string($con, $_POST['qualification']);
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    // Insert the new doctor into the database
    $insertQuery = "INSERT INTO `doctors`(`name`, `email`, `qualification`, `image`) VALUES ('$name', '$email', '$qualification', '$image')";
    if (mysqli_query($con, $insertQuery)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        echo "<script>
                swal({
                    title: 'Added!',
                    text: 'New doctor has been added.',
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
                    text: 'There was an error adding the doctor.',
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

if (isset($_POST['edit'])) {
    $doc_id = intval($_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $qualification = mysqli_real_escape_string($con, $_POST['qualification']);
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    $updateQuery = "UPDATE `doctors` SET `name` = '$name', `email` = '$email', `qualification` = '$qualification' WHERE `id` = $doc_id";
    if ($image) {
        $updateQuery = "UPDATE `doctors` SET `name` = '$name', `email` = '$email', `qualification` = '$qualification', `image` = '$image' WHERE `id` = $doc_id";
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }
    
    if (mysqli_query($con, $updateQuery)) {
        echo "<script>
                swal({
                    title: 'Updated!',
                    text: 'Doctor details have been updated.',
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
                    text: 'There was an error updating the doctor details.',
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
            <h3 class="fw-bold mb-3">Doctors Management</h3>
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
                    <a href="#">Doctors</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Doctors</h4>
                            <button
                                class="btn btn-primary btn-round ms-auto"
                                data-bs-toggle="modal"
                                data-bs-target="#addRowModal"
                            >
                                <i class="fa fa-plus"></i>
                                Add Doctor
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Add Doctor Modal -->
                        <div
                            class="modal fade"
                            id="addRowModal"
                            tabindex="-1"
                            role="dialog"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold"> Add</span>
                                            <span class="fw-light"> Doctor </span>
                                        </h5>
                                        <button
                                            type="button"
                                            class="close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="doctors.php" enctype="multipart/form-data">
                                            <div class="form-group form-group-default">
                                                <label>Name</label>
                                                <input
                                                    name="name"
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter name"
                                                    required
                                                />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input
                                                    name="email"
                                                    type="email"
                                                    class="form-control"
                                                    placeholder="Enter email"
                                                    required
                                                />
                                            </div>
                                            <div class="form-group">
    <label for="qualification">Doctor Qualification</label>
    <select class="form-select" id="qualification" name="qualification" required>
        <option value="" disabled selected>Select Qualification</option>
        <option value="MBBS">MBBS - Bachelor of Medicine, Bachelor of Surgery</option>
        <option value="MD">MD - Doctor of Medicine</option>
        <option value="DO">DO - Doctor of Osteopathic Medicine</option>
        <option value="BDS">BDS - Bachelor of Dental Surgery</option>
        <option value="MDS">MDS - Master of Dental Surgery</option>
        <option value="BHMS">BHMS - Bachelor of Homeopathic Medicine and Surgery</option>
        <option value="BAMS">BAMS - Bachelor of Ayurvedic Medicine and Surgery</option>
        <option value="DNB">DNB - Diplomate of National Board</option>
        <option value="DM">DM - Doctorate of Medicine</option>
        <option value="MCh">MCh - Master of Chirurgiae (Surgery)</option>
    </select>
</div>

                                            <div class="form-group">
                                                <label for="image">Picture</label>
                                                <input type="file" name="image" class="form-control-file" id="image" / required>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button
                                                    type="submit"
                                                    name="add_doctor"
                                                    class="btn btn-primary"
                                                >
                                                    Add Doctor
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
    Close
</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Doctor Modal -->
                        <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Edit</span>
                                            <span class="fw-light">Doctor</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editDoctorForm" method="post" action="doctors.php" enctype="multipart/form-data">
                                            <div class="form-group form-group-default">
                                                <label>Name</label>
                                                <input id="edit_name" name="name" type="text" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input id="edit_email" name="email" type="email" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                        <label>Qualification</label>
                        <select class="form-select" id="edit_qualification" name="qualification" required>
                            <option value="" disabled>Select Qualification</option>
                            <option value="MBBS">MBBS - Bachelor of Medicine, Bachelor of Surgery</option>
                            <option value="MD">MD - Doctor of Medicine</option>
                            <option value="DO">DO - Doctor of Osteopathic Medicine</option>
                            <option value="BDS">BDS - Bachelor of Dental Surgery</option>
                            <option value="MDS">MDS - Master of Dental Surgery</option>
                            <option value="BHMS">BHMS - Bachelor of Homeopathic Medicine and Surgery</option>
                            <option value="BAMS">BAMS - Bachelor of Ayurvedic Medicine and Surgery</option>
                            <option value="DNB">DNB - Diplomate of National Board</option>
                            <option value="DM">DM - Doctorate of Medicine</option>
                            <option value="MCh">MCh - Master of Chirurgiae (Surgery)</option>
                        </select>
                    </div>
                                            <div class="form-group">
                                                <label for="edit_image">Picture</label>
                                                <input type="file" name="image" class="form-control-file" id="edit_image" />
                                            </div>
                                            <input type="hidden" id="doctor_id" name="id">
                                            <div class="modal-footer border-0">
                                                <button type="submit" name="edit" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Qualification</th>
                                        <th>Picture</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Qualification</th>
                                        <th>Picture</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    // Fetch doctors from the database
                                    $result = $con->query("SELECT * FROM `doctors` ORDER BY `name` ASC");
                                    $count = 1;
                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($count) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['qualification']) . '</td>';
                                            echo '<td><img src="uploads/' . htmlspecialchars($row['image']) . '" width="100" height="100"></td>';
                                            echo '<td>
                                                <button
                                                    type="button"
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-bs-toggle="tooltip"
                                                    data-original-title="Edit"
                                                    onclick="openEditModal(' . $row['id'] . ', \'' . htmlspecialchars($row['name']) . '\', \'' . htmlspecialchars($row['email']) . '\', \'' . htmlspecialchars($row['qualification']) . '\')"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-link btn-danger"
                                                    data-bs-toggle="tooltip"
                                                    data-original-title="Delete"
                                                    onclick="confirmDelete(' . $row['id'] . ')"
                                                >
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                </form>
                                            </td>';
                                            echo '</tr>';
                                            $count++;
                                        }
                                    } else {
                                        echo '<tr><td colspan="6">No doctors found</td></tr>';
                                    }
                                    $con->close();
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
    <input type="hidden" name="doc_id" id="doc_id">
    <input type="hidden" name="delete" value="delete">
</form>

<?php
include 'footer.php';
?>

<script>
function openEditModal(id, name, email, qualification) {
    document.getElementById('doctor_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_qualification').value = qualification;
    $('#editRowModal').modal('show');
}

function confirmDelete(id) {
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
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
            // Set the doc_id value in the hidden form
            document.getElementById('doc_id').value = id;

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

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

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