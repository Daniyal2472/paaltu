<?php
include('header.php'); // Include header file

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input data
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'add') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $role = $_POST['role'];

            // Validate input data
            if (empty($name) || empty($email) || empty($password) || !in_array($role, ['Admin', 'User'])) {
                echo 'All fields are required and role must be valid.';
                exit();
            }

            // Hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and execute the SQL query
            $stmt = $con->prepare("INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES (?, ?, ?, ?)");
            if (!$stmt) {
                echo 'Error preparing statement: ' . $con->error;
                exit();
            }

            $stmt->bind_param("ssss", $name, $email, $hashedPassword, $role);

            if ($stmt->execute()) {
                header('Location: users.php'); // Redirect to the page displaying the list of users
            } else {
                echo 'Error executing statement: ' . $stmt->error;
            }

            $stmt->close();
        } elseif ($action === 'delete') {
            $id = $_POST['id'];

            // Prepare and execute the SQL query
            $stmt = $con->prepare("DELETE FROM `users` WHERE `id` = ?");
            if (!$stmt) {
                echo 'Error preparing statement: ' . $con->error;
                exit();
            }

            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                header('Location: users.php'); // Redirect to refresh the user list
            } else {
                echo 'Error executing statement: ' . $stmt->error;
            }

            $stmt->close();
        } elseif ($action === 'edit') {
            $id = $_POST['id'];
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $role = $_POST['role'];

            // Validate input data
            if (empty($name) || empty($email) || !in_array($role, ['Admin', 'User'])) {
                echo 'All fields are required and role must be valid.';
                exit();
            }

            $hashedPassword = empty($password) ? null : password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL query
            if ($hashedPassword) {
                $stmt = $con->prepare("UPDATE `users` SET `name` = ?, `email` = ?, `password` = ?, `role` = ? WHERE `id` = ?");
                $stmt->bind_param("ssssi", $name, $email, $hashedPassword, $role, $id);
            } else {
                $stmt = $con->prepare("UPDATE `users` SET `name` = ?, `email` = ?, `role` = ? WHERE `id` = ?");
                $stmt->bind_param("sssi", $name, $email, $role, $id);
            }

            if ($stmt->execute()) {
                header('Location: users.php'); // Redirect to refresh the user list
            } else {
                echo 'Error executing statement: ' . $stmt->error;
            }

            $stmt->close();
        }
    }
}
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">User Management</h3>
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
                    <a href="#">Users</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Users</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i> Add User
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Add User Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">New</span>
                                            <span class="fw-light">User</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="small">Fill in the details to add a new user.</p>
                                        <form action="users.php" method="post">
                                            <input type="hidden" name="action" value="add" />
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Name</label>
                                                        <input name="name" type="text" class="form-control" placeholder="Name" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input name="email" type="email" class="form-control" placeholder="Email" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Password</label>
                                                        <input name="password" type="password" class="form-control" placeholder="Password" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Role</label><br />
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="role" value="Admin" />
                                                                <label class="form-check-label">Admin</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="role" value="User" checked />
                                                                <label class="form-check-label">User</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit User Modal -->
                        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">Edit User</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="small">Update the user details.</p>
                                        <form action="users.php" method="post">
                                            <input type="hidden" name="action" value="edit" />
                                            <input type="hidden" name="id" id="editId" />
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Name</label>
                                                        <input name="name" type="text" id="editName" class="form-control" placeholder="Name" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input name="email" type="email" id="editEmail" class="form-control" placeholder="Email" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Password (leave blank to keep unchanged)</label>
                                                        <input name="password" type="password" id="editPassword" class="form-control" placeholder="Password" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Role</label><br />
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="role" value="Admin" id="editRoleAdmin" />
                                                                <label class="form-check-label" for="editRoleAdmin">Admin</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="role" value="User" id="editRoleUser" checked />
                                                                <label class="form-check-label" for="editRoleUser">User</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Users Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch users from the database
                                    $result = $con->query("SELECT * FROM `users`");

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['role']) . '</td>';
                                            echo '<td>
                                                <button
                                                  type="button"
                                                  data-bs-toggle="tooltip"
                                                  title="Edit User"
                                                  class="btn btn-link btn-primary btn-lg"
                                                  onclick="editUser(' . $row['id'] . ', \'' . htmlspecialchars($row['name']) . '\', \'' . htmlspecialchars($row['email']) . '\', \'' . htmlspecialchars($row['role']) . '\')"
                                                >
                                                  <i class="fa fa-edit"></i>
                                                </button>
                                                <form action="users.php" method="post" style="display:inline;">
                                                    <input type="hidden" name="action" value="delete" />
                                                    <input type="hidden" name="id" value="' . $row['id'] . '" />
                                                    <button
                                                      type="submit"
                                                      class="btn btn-link btn-danger"
                                                      data-bs-toggle="tooltip"
                                                      title="Remove"
                                                    >
                                                      <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="4">No users found</td></tr>';
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

<!-- Scripts -->
<script>
    function editUser(id, name, email, role) {
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editEmail').value = email;
        document.getElementById('editRole' + (role === 'Admin' ? 'Admin' : 'User')).checked = true;
        $('#editUserModal').modal('show');
    }
</script>

<?php include('footer.php'); // Include footer file ?>
