<?php
include 'header.php';
?>
<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">DataTables.Net</h3>
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
                  <a href="#">Tables</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Datatables</a>
                </li>
              </ul>
            </div>
            <div class="row">
<div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Add Row</h4>
                      <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add Row
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                   <!-- Add Pet Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> New</span>
                    <span class="fw-light"> Pet </span>
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">Create a new pet entry using this form, make sure you fill them all</p>
                <form id="addPetForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="petName">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="petName"
                                    name="name"
                                    placeholder="Enter pet name"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="petSpecies">Species</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="petSpecies"
                                    name="species"
                                    placeholder="Enter pet species"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="petBreed">Breed</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="petBreed"
                                    name="breed"
                                    placeholder="Enter pet breed"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="petAge">Age</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="petAge"
                                    name="age"
                                    placeholder="Enter pet age"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Gender</label><br />
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="gender"
                                            id="genderMale"
                                            value="Male"
                                        />
                                        <label
                                            class="form-check-label"
                                            for="genderMale"
                                        >
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="gender"
                                            id="genderFemale"
                                            value="Female"
                                            checked
                                        />
                                        <label
                                            class="form-check-label"
                                            for="genderFemale"
                                        >
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="petImage">Image</label>
                                <input
                                    type="file"
                                    class="form-control-file"
                                    id="petImage"
                                    name="image"
                                />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Add Pet</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
                          <th>Name</th>
                            <th>Species</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Vaccination Status</th>
                            <th>Image</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Name</th>
                            <th>Species</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Vaccination Status</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM `pets`");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['species']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['breed']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['age']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['gender']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['vaccination_status']) . '</td>';
                                echo '<td><img src="uploads/' . htmlspecialchars($row['image']) . '" width="100" height="100" /></td>';
                                echo '<td>
                                    <div class="form-button-action">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#editRowModal' . $row['id'] . '" class="btn btn-link btn-primary btn-lg">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteRowModal' . $row['id'] . '" class="btn btn-link btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    </td>';
                                echo '</tr>';
                                }}
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
                                
                                <?php
                                include 'footer.php';
                                ?>