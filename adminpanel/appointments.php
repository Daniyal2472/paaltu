<?php
include 'header.php';

if (isset($_POST['updateAppointment'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $postal_code = $_POST['postal_code'];

    // Prepare an update statement
    $stmt = $con->prepare("UPDATE `appointments` SET `name` = ?, `email` = ?, `phone number` = ?, `doctor_id` = ?, `date` = ?, `time` = ?, `city` = ?, `area` = ?, `postal_code` = ? WHERE `id` = ?");
    $stmt->bind_param("sssssssssi", $name, $email, $phone_number, $doctor_id, $date, $time, $city, $area, $postal_code, $id);

    if ($stmt->execute()) {
        echo "<script>
                swal({
                    title: 'Updated!',
                    text: 'Appointment updated successfully.',
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

    $stmt->close();
}

// Delete code PHP
if (isset($_POST['deleteId'])) {
    $idToDelete = $_POST['deleteId'];
    $stmt = $con->prepare("DELETE FROM `appointments` WHERE `id` = ?");
    $stmt->bind_param("i", $idToDelete);
    if ($stmt->execute()) {
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
    $stmt->close();
}
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Appointment Management</h3>
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
                    <a href="#">Appointments</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Appointments</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Update</span>
                                            <span class="fw-light">Appointment</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editAppointmentForm" method="POST">
                                            <input type="hidden" name="id" id="editId" />
                                            <div class="form-group form-group-default">
                                                <label>Name</label>
                                                <input id="editName" name="name" type="text" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input id="editEmail" name="email" type="email" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Contact Number</label>
                                                <input id="editPhoneNumber" name="phone_number" type="text" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Doctor</label>
                                                <input id="editDoctorId" name="doctor_id" type="text" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Date</label>
                                                <input id="editDate" name="date" type="date" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Time</label>
                                                <input id="editTime" name="time" type="time" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>City</label>
                                                <input id="editCity" name="city" type="text" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Area</label>
                                                <input id="editArea" name="area" type="text" class="form-control" required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Postal Code</label>
                                                <input id="editPostalCode" name="postal_code" type="text" class="form-control" required />
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" name="updateAppointment" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact number</th>
                                        <th>Doctor</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>City</th>
                                        <th>Area</th>
                                        <th>Postal code</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact number</th>
                                        <th>Doctor</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>City</th>
                                        <th>Area</th>
                                        <th>Postal code</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    // Prepare the SQL statement using a prepared statement
                                    $stmt = $con->prepare("SELECT * FROM `appointments` ORDER BY `date` DESC, `time` DESC;");
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    $count = 1;
                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($count) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['phone number']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['doctor_id']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['date']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['time']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['city']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['area']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['postal_code']) . '</td>';
                                            echo '<td>
                                                    <div class="form-button-action">
                                                        <button
                                                            type="button"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task"
                                                            onclick="populateEditForm(
                                                                ' . htmlspecialchars($row['id']) . ',
                                                                \'' . htmlspecialchars($row['name']) . '\',
                                                                \'' . htmlspecialchars($row['email']) . '\',
                                                                \'' . htmlspecialchars($row['phone number']) . '\',
                                                                \'' . htmlspecialchars($row['doctor_id']) . '\',
                                                                \'' . htmlspecialchars($row['date']) . '\',
                                                                \'' . htmlspecialchars($row['time']) . '\',
                                                                \'' . htmlspecialchars($row['city']) . '\',
                                                                \'' . htmlspecialchars($row['area']) . '\',
                                                                \'' . htmlspecialchars($row['postal_code']) . '\'
                                                            )"
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
                                                    </div>
                                                </td>';

                                            echo '</tr>';
                                            $count++;
                                        }
                                    } else {
                                        echo '<tr><td colspan="11">No doctors found</td></tr>';
                                    }

                                    // Close the statement and connection
                                    $stmt->close();
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

<input type="hidden" id="editId" name="editId">

<form id="deleteForm" method="POST" style="display:none;">
    <input type="hidden" name="deleteId" id="deleteId">
</form>

<?php
include 'footer.php';
?>
<script>
    function populateEditForm(id, name, email, phoneNumber, doctorId, date, time, city, area, postalCode) {
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editEmail').value = email;
        document.getElementById('editPhoneNumber').value = phoneNumber;
        document.getElementById('editDoctorId').value = doctorId;
        document.getElementById('editDate').value = date;
        document.getElementById('editTime').value = time;
        document.getElementById('editCity').value = city;
        document.getElementById('editArea').value = area;
        document.getElementById('editPostalCode').value = postalCode;
        $('#editRowModal').modal('show');
    }

    //delete function
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
                // Set the deleteId value in the hidden form
                document.getElementById('deleteId').value = id;

                // Submit the form
                document.getElementById('deleteForm').submit();
            } else {
                swal.close();
            }
        });
    }
</script>
