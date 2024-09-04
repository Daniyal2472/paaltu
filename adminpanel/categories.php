<?php
include 'header.php';

if (isset($_POST['delete'])) {
  $cat_id = intval($_POST['cat_id']);
  // Perform the delete operation
  $deleteQuery = "DELETE FROM `categories` WHERE `id` = $cat_id";
  if (mysqli_query($con, $deleteQuery)) {
      echo "<script>
              swal({
                  title: 'Deleted!',
                  text: 'Category has been deleted.',
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
                  text: 'There was an error deleting the category.',
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

if (isset($_POST['add_category'])) {
  $category_name = mysqli_real_escape_string($con, $_POST['category_name']);

  // Insert the new category into the database
  $insertQuery = "INSERT INTO `categories`(`name`) VALUES ('$category_name')";
  if (mysqli_query($con, $insertQuery)) {
      echo "<script>
              swal({
                  title: 'Added!',
                  text: 'New category has been added.',
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
                  text: 'There was an error adding the category.',
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
  $cat_id = intval($_POST['id']);
  $cat_name = mysqli_real_escape_string($con, $_POST['name']);

  $updateQuery = "UPDATE `categories` SET `name` = '$cat_name' WHERE `id` = $cat_id";
  if (mysqli_query($con, $updateQuery)) {
      echo "<script>
              swal({
                  title: 'Updated!',
                  text: 'Category has been updated.',
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
                  text: 'There was an error updating the category.',
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
              <h3 class="fw-bold mb-3">Categories Management</h3>
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
                  <a href="#">Categories</a>
                </li>
                </li>
              </ul>
            </div>
            <div class="row">

              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Categories</h4>
                      <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add Category
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Modal -->
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
          <span class="fw-light"> Category </span>
        </h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="categories.php">
          <div class="form-group form-group-default">
            <label>Category Name</label>
            <input
              name="category_name"
              type="text"
              class="form-control"
              placeholder="Enter category name"
              required
            />
          </div>
          <div class="modal-footer border-0">
            <button
              type="submit"
              name="add_category"
              class="btn btn-primary"
            >
              Add Category
            </button>
            <button
              type="button"
              class="btn btn-danger"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Edit</span>
                    <span class="fw-light">Category</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" method="post">
                    <div class="form-group form-group-default">
                        <label>Category Name</label>
                        <input id="editCategoryName" type="text" class="form-control" name="name" required />
                    </div>
                    <input type="hidden" id="editCategoryId" name="id">
                    <div class="modal-footer border-0">
                        <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                          <th>#</th>
                          <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        <?php
                                    // Fetch users from the database
                                    $result = $con->query("SELECT * FROM `categories` ORDER BY `name` ASC");
                                    $count = 1;
                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($count) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                            echo '<td>
                                                 <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-primary btn-lg"
                                  data-original-title="Edit Task"
                                  onclick="openEditModal(' . $row['id'] . ', \'' . htmlspecialchars($row['name']) . '\')"
                                > 
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-danger"
                                  data-original-title="Remove"
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
<!-- Hidden delete form -->
<form id="deleteForm" method="post" style="display: none;">
    <input type="hidden" name="cat_id" id="cat_id">
    <input type="hidden" name="delete" value="delete">
</form>
<?php
include 'footer.php';
?>
<script>
  function openEditModal(id, name) {
    document.getElementById('editCategoryId').value = id;
    document.getElementById('editCategoryName').value = name;
    $('#editCategoryModal').modal('show');
}

</script>
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
            // Set the cat_id value in the hidden form
            document.getElementById('cat_id').value = id;

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